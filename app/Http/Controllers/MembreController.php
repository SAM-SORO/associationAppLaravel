<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Membre; // Assurez-vous d'importer le modèle Membre si ce n'est pas déjà fait
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



class MembreController extends Controller
{
    // Affiche un formulaire pour créer un nouveau membre
    public function create()
    {
        return view('membres.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:membres,email',
            'prenom' => 'required|string|max:255',
            'telphone' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date_adhesion' => 'required|date',
            'date_naissance' => 'required|date',
        ]);
    
        // Création du membre
        $membre = new Membre();
        $membre->nom = $request->nom;
        $membre->email = $request->email;
        $membre->prenom = $request->prenom;
        $membre->telphone = $request->telphone;
        $membre->date_naissance = $request->date_naissance;
        $membre->date_adhesion = $request->date_adhesion;
        $membre->groupe_id = Auth::user()->groupe_id; 
    
        // Gestion de l'upload d'image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $membre->image = $imagePath;
        }
    
        $membre->save();
    
        // Redirection avec un message flash
        return redirect()->route('home')->with('success', 'Le membre a été créé avec succès !');
    }


    public function show($id)
    {
        // Récupère le membre par son ID
        $membre = Membre::findOrFail($id);
        $age = Carbon::parse($membre->date_naissance)->age;

        // Retourne la vue avec les détails du membre
        return view('membres.info', compact('membre', 'age'));
    }

    public function edit($id)
    {
        // Récupérer le membre avec les relations nécessaires
        $membre = Membre::with(['groupe.section.ville'])->findOrFail($id);

        // Retourner la vue d'édition avec les données du membre
        return view('membres.edit', compact('membre'));
    }
    
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:membres,email,'.$id,
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|numeric',
            'groupe_id' => 'nullable|exists:groupes,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Recherche du membre à mettre à jour
        $membre = Membre::findOrFail($id);
    
        // Mise à jour des données du membre
        $membre->nom = $request->nom;
        $membre->email = $request->email;
        $membre->prenom = $request->prenom;
        $membre->telphone = $request->telphone;
        $membre->groupe_id = Auth::user()->groupe_id;
    
        // Gestion de l'upload d'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($membre->image) {
                Storage::disk('public')->delete($membre->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $membre->image = $imagePath;
        }
    
        $membre->save();
    
        // Redirection avec un message flash
        return redirect()->route('home')->with('success', 'Le membre a été mis à jour avec succès !');
    }

    public function destroy($id)
    {
        // Trouver le membre par ID
        $membre = Membre::findOrFail($id);

        // Supprimer le membre
        $membre->delete();

        // Rediriger avec un message de succès
        return redirect()->route('association.index')->with('success', 'Membre supprimé avec succès');
    }
    
}

