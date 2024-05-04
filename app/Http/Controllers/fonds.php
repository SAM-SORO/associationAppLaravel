<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fonds extends Controller
{
    //
    public function index(){
        return view('fonds.list');
    }

    public function create(){
        return view('fonds.create');
    }

    public function paiement(){
        return view('fonds.paiement');
    }
}



