<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class admin extends Controller
{
    //
    public function index()
    {
        $user_count = User::count();

        return view('association.dashboard',  [
            'user_count' => $user_count,
        ]);
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
