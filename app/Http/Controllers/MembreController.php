<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Membre; // Assurez-vous d'importer le modèle Membre si ce n'est pas déjà fait

class MembreController extends Controller
{
    // Affiche un formulaire pour créer un nouveau membre
    public function create()
    {
        return view('membres.create');
    }

    // Enregistre un nouveau membre dans la base de données
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:membres,email',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|numeric',
            'groupe_id' => 'nullable|exists:groupes,id',
        ]);

        // Création du membre
        $membre = new Membre();
        $membre->nom = $request->nom;
        $membre->email = $request->email;
        $membre->prenom = $request->prenom;
        $membre->telephone = $request->telephone;
        $membre->groupe_id = $request->groupe_id;
        $membre->save();

        // Redirection avec un message flash
        return redirect()->route('home')->with('success', 'Le membre a été créé avec succès !');
    }
    
    // Affiche un formulaire pour modifier un membre existant
    public function edit($id)
    {
        $membre = Membre::findOrFail($id);
        return view('membres.edit', compact('membre'));
    }

    // Met à jour un membre dans la base de données
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:membres,email,'.$id,
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|numeric',
            'groupe_id' => 'nullable|exists:groupes,id',
        ]);

        // Recherche du membre à mettre à jour
        $membre = Membre::findOrFail($id);

        // Mise à jour des données du membre
        $membre->nom = $request->nom;
        $membre->email = $request->email;
        $membre->prenom = $request->prenom;
        $membre->telephone = $request->telephone;
        $membre->groupe_id = $request->groupe_id;
        $membre->save();

        // Redirection avec un message flash
        return redirect()->route('home')->with('success', 'Le membre a été mis à jour avec succès !');
    }
}

