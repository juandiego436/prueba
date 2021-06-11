<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function create()
    {

    }

    public function find($id)
    {

    }

    public function update()
    {

    }

    public function delete($id)
    {

    }
}
