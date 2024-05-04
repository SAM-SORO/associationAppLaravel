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

    //celui la donne la vue sur l'ensemble des membres
    public function membres(){
        return view('association.index');
    }

    //celui la donne la vue de creation des membres
    public function ajouterMembre(){
        return view('membres.create');
    }

    //celui la donne la vue de modification des membres
    public function modifierMembre(){
        return view('membres.edit');
    }

    //celui la donne la vue d'info sur un membre
    public function infoMembre(){
        return view('membres.info');
    }

    //celui la donne la vue de creation des responsables
    public function ajouterResponsable(){
        return view('membres.create');
    }

    //celui la donne la vue de creation des responsables
    public function modifierResponsable(){
        return view('membres.edit');
    }


    //celui la donne la vue sur les informations d'un responsable
    public function infoResponsable(){
        return view('responsables.info');
    }

    //celui la donne la vue sur le login
    public function login(){
        return view('auth.login');
    }

    //celui la donne la vue sur l'inscription
    public function register(){
        return view('auth.register');
    }

}
