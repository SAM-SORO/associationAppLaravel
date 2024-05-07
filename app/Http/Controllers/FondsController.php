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

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'label' => 'required|string|max:255',
            'responsable' => 'nullable|exists:users,id',
            'section_id' => 'nullable|exists:sections,id',
        ]);

        // Création du groupe

        // Redirection avec un message flash
        return redirect()->route('home')->with('success', 'Le groupe a été créé avec succès !');
    }

    public function paiement(){
        return view('fonds.paiement');
    }
}



