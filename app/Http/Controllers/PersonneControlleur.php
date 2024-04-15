<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Membre;


class PersonneControlleur extends Controller
{
    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Créer un nouvel utilisateur en utilisant la méthode create() du modèle User
        $user = User::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'telphone' => $request->input('telphone'),
            'role' => $request->input('role'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')), // Assurez-vous de hasher le mot de passe
        ]);

        // Ensuite, vous pouvez retourner une réponse JSON pour indiquer que l'utilisateur a été créé avec succès
        return response()->json(['message' => 'L\'utilisateur a été créé avec succès'], 201);
    }

    public function create_member(Request $request, $id_groupe){
        // Valider les données du formulaire (vous pouvez utiliser les règles de validation de Laravel ici)
    
        // Création d'un nouveau membre
        $membre = Membre::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'telephone' => $request->input('telephone'),
            'groupe' => $id_groupe,
        ]);
    
        // Journalisation de l'action
        \Log::info("Création d'un nouveau membre pour le groupe avec l'identifiant $id_groupe");
    
        return view('association.registerMembre');
    }

}