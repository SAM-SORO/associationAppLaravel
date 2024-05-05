<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\User;
use App\Models\Ville;

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
        $villes = Ville::all();
        return view('sections.create', compact('users', 'villes'));
    }

    // Enregistre une nouvelle section dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'responsable' => 'nullable|exists:users,id',
            'ville_id' => 'nullable|exists:villes,id',
        ]);

        Section::create($request->all());

        return redirect()->route('home')->with('success', 'La section a été créée avec succès !');
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
