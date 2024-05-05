<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FondsController extends Controller
{
    //
    public function index(){
        return view('fonds.list');
    }

    public function create(){
        return view('fonds.create');
    }
}



