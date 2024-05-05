<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ville;

class VilleController extends Controller
{
    // Affiche la liste des villes
    public function index()
    {
        $villes = Ville::all();
        return view('villes.index', compact('villes'));
    }

    // Affiche le formulaire de création d'une nouvelle ville
    public function create()
    {
        return view('villes.create');
    }

    // Enregistre une nouvelle ville dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'responsable' => 'nullable|exists:users,id',
        ]);

        Ville::create($request->all());

        return redirect()->route('home')->with('success', 'La ville a été créée avec succès !');
    }

    // Affiche les détails d'une ville spécifique
    public function show($id)
    {
        $ville = Ville::findOrFail($id);
        return view('villes.show', compact('ville'));
    }

    // Affiche le formulaire de modification d'une ville
    public function edit($id)
    {
        $ville = Ville::findOrFail($id);
        return view('villes.edit', compact('ville'));
    }

    // Met à jour une ville dans la base de données
    public function update(Request $request, $id)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'responsable' => 'nullable|exists:users,id',
        ]);

        $ville = Ville::findOrFail($id);
        $ville->update($request->all());

        return redirect()->route('villes.index')->with('success', 'La ville a été mise à jour avec succès !');
    }

    // Supprime une ville de la base de données
    public function destroy($id)
    {
        $ville = Ville::findOrFail($id);
        $ville->delete();

        return redirect()->route('villes.index')->with('success', 'La ville a été supprimée avec succès !');
    }
}
