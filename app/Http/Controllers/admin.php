<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class admin extends Controller
{
    //
    public function index(){
        return view('association.dashboard');
    }


    public function membres(){
        return view('association.membre');
    }

    public function createMember(){
        return view('association.create');
    }

    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

}
