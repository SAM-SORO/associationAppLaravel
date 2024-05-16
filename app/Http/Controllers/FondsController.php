<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ville;
use App\Models\Section;
use App\Models\Groupe;

class FondsController extends Controller
{
    //
    public function index(){
        return view('fonds.list');
    }

    // public function create(){
    //     return view('fonds.create');
    // }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'label' => 'required|string|max:255',
            // 'responsable' => 'nullable|exists:users,id',
            // 'section_id' => 'nullable|exists:sections,id',
        ]);

        // Création du groupe

        // Redirection avec un message flash
        return redirect()->route('home')->with('success', 'Le groupe a été créé avec succès !');
    }


    public function create($departement)
    {
        $departements = [];
        if ($departement === "ville") {
            $departements = Ville::where('auteur', auth()->id())
                                 ->whereNull('auteur')
                                 ->get();
        } elseif ($departement === 'groupe') {
            $departements = Groupe::where('auteur', auth()->id())
                                  ->whereNull('auteur')
                                  ->get();
        } elseif ($departement === 'section') {
            $departements = Section::where('auteur', auth()->id())
                                   ->whereNull('auteur')
                                   ->get();
        }
        return view('fonds.create', compact('departement', 'departements'));
    }

    public function paiement(){
        return view('fonds.paiement');
    }
}



