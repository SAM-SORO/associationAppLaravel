<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    // Affiche la liste des sections
    public function index()
    {
        $sections = Section::all();
        return view('sections.index', compact('sections'));
    }

    // Affiche le formulaire de création d'une nouvelle section
    public function create()
    {
        $users = User::all();
        $villes = Ville::where("auteur", Auth::user()->id)
                       ->orwhere("responsable", Auth::user()->id)->get();
        return view('sections.create', compact('villes'));
    }

    // Enregistre une nouvelle section dans la base de données
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'label' => 'required|string|max:255',
            'section_id' => 'nullable|exists:sections,id',
        ]);
    
        // Création du groupe
        $section = new Section();
        $section->label = $request->label;
        $section->responsable = Auth::id(); // Utilisateur actuellement authentifié comme responsable
        $section->auteur = Auth::id(); // Utilisateur actuellement authentifié comme auteur
        $section->ville_id = $request->section_id;
        $section->save();
    
        // Redirection avec un message flash
        return redirect()->route('home')->with('success', 'Le groupe a été créé avec succès !');
    }

    // Affiche les détails d'une section spécifique
    public function show($id)
    {
        $section = Section::findOrFail($id);
        return view('sections.show', compact('section'));
    }

    // Affiche le formulaire de modification d'une section
    public function edit($id)
    {
        $section = Section::findOrFail($id);
        return view('sections.edit', compact('section'));
    }

    // Met à jour une section dans la base de données
    public function update(Request $request, $id)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'responsable' => 'nullable|exists:users,id',
            'ville_id' => 'nullable|exists:villes,id',
        ]);

        $section = Section::findOrFail($id);
        $section->update($request->all());

        return redirect()->route('sections.index')->with('success', 'La section a été mise à jour avec succès !');
    }

    // Supprime une section de la base de données
    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        $section->delete();

        return redirect()->route('sections.index')->with('success', 'La section a été supprimée avec succès !');
    }
}
