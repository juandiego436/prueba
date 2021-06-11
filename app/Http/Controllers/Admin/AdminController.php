<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Country;
use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = User::paginate(8);
        //dd($users->toArray());
        return view('admin.index', compact('users'));
    }

    public function create()
    {
        $title = 'Registro de usuarios';
        $countries = Country::orderBy('name','asc')->get();
        $cities = City::orderBy('name','asc')->get();
        return view('admin.form', compact('countries','cities','title'));
    }

    public function save(Request $request)
    {
        try
        {
            //Validaciones
            $age = now()->subYear(18)->toDateString();
            $validator = Validator::make($request->all(),[
                'name' => 'string|max:100',
                'email' => 'string|email|unique:users',
                'password' => 'required|string|confirmed|min:8|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
                'phone' => 'string|max:10',
                'dni' => 'string|max:11',
                'date_birth' => 'before_or_equal:' .$age
            ],[
                'date_birth.before_or_equal' => 'La fecha de nacimiento debe ser mayor a 18',
                'password.regex' => 'La contraseña debe incluir una Letra Mayuscula,Numero y un caracter especial'
            ]);

            if($validator->fails()){
                return back()->withInput()->withErrors($validator->errors());
            }

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->dni = $request->dni;
            $user->city_id = $request->city;
            $user->date_birth = $request->date_birth;
            $user->save();
            return redirect(route('admin.index'))->with('success','Se registro usuario');
        }catch(Exception $e)
        {
            Log::error($e);
            return back()->with('error','Problem ocurred.');
        }
    }

    public function find($id)
    {
        try
        {
            $title = 'Actualizar Usuario';
            $user = User::find($id);
            $countries = Country::orderBy('name','asc')->get();
            $cities = City::orderBy('name','asc')->get();
            return view('admin.form', compact('title','user','cities','countries'));
        }catch(Exception $e)
        {
            Log::error($e);
            return back()->with('error','Problem ocurred.');
        }
    }

    public function update(Request $request)
    {
        try
        {
            //Validaciones
            $age = now()->subYear(18)->toDateString();
            $validator = Validator::make($request->all(),[
                'name' => 'string|max:100',
                'password' => 'required|string|confirmed|min:8|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
                'phone' => 'string|max:10',
                'date_birth' => 'before_or_equal:' .$age
            ],[
                'date_birth.before_or_equal' => 'La fecha de nacimiento debe ser mayor a 18',
                'password.regex' => 'La contraseña debe incluir una Letra Mayuscula,Numero y un caracter especial'
            ]);

            if($validator->fails()){
                return back()->withInput()->withErrors($validator->errors());
            }

            $user = User::find($request->id);
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->city_id = $request->city;
            $user->date_birth = $request->date_birth;
            $user->save();
            return redirect(route('admin.index'))->with('success','Se Actualizo usuario');
        }catch(Exception $e)
        {
            Log::error($e);
            return back()->with('error','Problem ocurred.');
        }
    }

    public function delete($id)
    {
        try
        {
            $user = User::find($id);
            $name = $user->name;
            $user->delete();
            return redirect(route('admin.index'))->with('success','Se Elimino usuario ' . $name);
        }catch(Exception $e)
        {
            Log::error($e);
            return back()->with('error','Problem ocurred.');
        }
    }
}
