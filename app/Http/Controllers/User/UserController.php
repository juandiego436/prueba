<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Inbox;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        return view('user.index');
    }

    public function mail()
    {
        $mails = Inbox::paginate(8);
        return view('user.mail.index', compact('mails'));
    }

    public function send()
    {
        $title = 'Enviar correo';
        return view('user.mail.form',compact('title'));
    }

    public function save(Request $request)
    {
        try
        {
           $validator = Validator::make($request->all(),[
               'from' => 'string|email|max:150',
               'subject' => 'string|min:3|max:70',
               'message' => 'string|required|max:500'
           ],[
               'from.email' => 'Por favor ingresar correo email@domain.com',
               'from.max' => 'No exceder de los 150 caracteres',
               'message.required' => 'Mensaje es requerido',
               'message.max' => 'Mensaje no debe exceder los 500 caracteres'
           ]);

           if($validator->fails())
           {
               return back()->withInput()->withErrors($validator->errors());
           }

           $inbox = new Inbox();
           $inbox->user_id = Auth::user()->id;
           $inbox->from = $request->from;
           $inbox->subject = $request->subject;
           $inbox->message = $request->message;
           $inbox->save();

           return redirect(route('user.mail.index'))->with('success','Se guardo correo a enviar');
        }catch(Exception $e){
            Log::error($e);
            return back()->with('error','Problem ocurred.');
        }
    }
}
