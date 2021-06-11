<?php

namespace App\Http\Controllers;

use Auth;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //use AuthenticatesUsers;
    //protected $redirectTo = '/admin/dashboard';

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        try
        {
            $validator = Validator::make($request->all(),[
                'email' => 'required|string|email',
                'password' => 'required|string|min:6'
            ]);

            if($validator->fails())
            {
                return back()->withInput()->withErrors($validator->errors());
            }

            if(Auth::guard('admin')->attempt(['email' => $request->email,'password' => $request->password]))
            {
                return redirect()->intended(route('admin.index'));
            }else if(Auth::guard('user')->attempt(['email' => $request->email,'password' => $request->password]))
            {
                return redirect()->intended(route('user.index'));
            }

            return back()->withInput()->with('error','Credenciales incorrectas');

        }catch(Exception $e){
            Log::error($e);
            return back()->with('error','Problem ocurred.');
        }
    }

    public function logout()
    {
    }
}
