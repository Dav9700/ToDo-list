<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function Login()
    {
        return view('auth.login');
    }

    public function Register()
    {
        return view('auth.register');
    }


}
