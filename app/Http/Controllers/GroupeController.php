<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Groupe;
use App\Models\User;
use App\Models\Section;

class GroupeController extends Controller
{
    // Affiche un formulaire pour créer un nouveau groupe
    public function create()
    {
        $users = User::all();
        $sections = Section::all();
        return view('groupes.create', compact('users', 'sections'));
    }

    // Enregistre un nouveau groupe dans la base de données
        // 'responsable' => 'nullable|exists:users,id',
        public function store(Request $request)
        {
            // Validation des données
            $request->validate([
                'label' => 'required|string|max:255',
                'section_id' => 'nullable|exists:sections,id',
            ]);
        
            // Création du groupe
            $groupe = new Groupe();
            $groupe->label = $request->label;
            $groupe->responsable = auth()->user()->id; // Ajout du point-virgule ici
            $groupe->auteur = auth()->user()->id;
            $groupe->section_id = $request->section_id;
            $groupe->save();
        
            // Redirection avec un message flash
            return redirect()->route('home')->with('success', 'Le groupe a été créé avec succès !');
        }
        

    // Affiche un formulaire pour modifier un groupe existant
    public function edit($id)
    {
        $groupe = Groupe::findOrFail($id);
        return view('groupes.edit', compact('groupe'));
    }

    // Met à jour un groupe dans la base de données
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'label' => 'required|string|max:255',
            'responsable' => 'nullable|exists:users,id',
            'section_id' => 'nullable|exists:sections,id',
        ]);

        // Recherche du groupe à mettre à jour
        $groupe = Groupe::findOrFail($id);
        $groupe->label = $request->label;
        $groupe->responsable = $request->responsable;
        $groupe->section_id = $request->section_id;
        $groupe->save();

        // Redirection avec un message flash
        return redirect()->route('groupes.index')->with('success', 'Le groupe a été mis à jour avec succès !');
    }
}
