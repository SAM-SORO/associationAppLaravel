<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Membre;
use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    // Méthode pour gérer la création de compte
    // public function store(Request $request)
    // {
    //     // Validation des données du formulaire de création de compte
    //     $request->validate([
    //         'nom' => 'required|string',
    //         'prenom' => 'required|string',
    //         'telphone' => 'required|string',
    //         'role' => 'required|string',
    //         'email' => 'required|email',
    //         'password' => 'required|min:6',
    //         // Ajoutez ici d'autres règles de validation pour les autres champs...
    //     ]);
    
    //     // Création de l'utilisateur
    //     $user = new User();
    //     $user->nom = $request->nom;
    //     $user->prenom = $request->prenom;
    //     $user->telphone = $request->telphone;
    //     $user->role = $request->role;
    //     $user->email = $request->email;
    //     $user->password = bcrypt($request->password);

    //     $user->save();

    //     Auth::login($user);
    //     return redirect()->route('home');
    // }

    // Méthode pour afficher le formulaire de création de compte
    public function create()
    {
        return view('auth.register');
    }

    // Méthode pour afficher le formulaire de connexion
    public function loginForm()
    {
        return view('auth.login');
       
    }

    // Méthode pour gérer la soumission du formulaire de connexion
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }
        return redirect()->route('auth.login')->withErrors(['email' => 'Email ou mot de passe incorrect.']);
    }

    // Méthode pour gérer la déconnexion de l'utilisateur
    public function logout(Request $request)
    {
        Auth::logout();

        // Redirection vers une autre page après la déconnexion
        return redirect()->route('auth.login');
    }

    // Le dashboard
    public function index()
    {
        $user_count = User::count();
        if (Auth::check()) 
        {
            return view('association.dashboard',  [
                'user_count' => $user_count,
            ]);
        } 
        else
        {
            return view('auth.login');
        }

    }

    //celui la donne la vue sur l'ensemble des membres
    public function membres(){
        return view('association.index');
    }

    //celui la donne la vue de creation des membres
    public function ajouterMembre(Request $request){
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email',
                'tel' => 'required',
                'nom' => 'required',
                'prenom' => 'required',
            ]);
    
            $membre = new Membre();
            $membre->tel = $request->tel;
            $membre->nom = $request->nom;
            $membre->prenom = $request->prenom;
            $membre->save();
            
            // Rediriger vers la vue association.index après l'ajout du membre
            return view('association.index');
        }
    
        // Afficher la vue de création de membre si la méthode de requête n'est pas POST
        return view('membres.create');
    }
    
    //celui la donne la vue de modification des membres
    public function modifierMembre(){
        return view('membres.edit');
    }

    //celui la donne la vue d'info sur un membre
    public function infoMembre(){
        return view('membres.info');
    }

    //celui la donne la vue de creation des responsables
    public function ajouterResponsable(){
        return view('membres.create');
    }

    //celui la donne la vue de creation des responsables
    public function modifierResponsable(){
        return view('membres.edit');
    }


    //celui la donne la vue sur les informations d'un responsable
    public function infoResponsable(){
        return view('responsables.info');
    }


    //celui la donne la vue sur l'inscription
    public function register(){
        return view('auth.register');
    }

}
