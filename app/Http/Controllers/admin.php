<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class admin extends Controller
{
    //celui la donne la vue sur le dashbord
    public function index(){
        return view('association.dashboard');
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
