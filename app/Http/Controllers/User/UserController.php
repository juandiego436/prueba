<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Inbox;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

    public function sendPost(Request $request)
    {
        try
        {

        }catch(Exception $e){
            Log::error($e);
            return back()->with('error','Problem ocurred.');
        }
    }
}
