<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Membre;
use Illuminate\Support\Facades\Auth;
use App\Models\Ville;
use App\Models\Groupe;
use App\Models\Section;


class AdminController extends Controller
{

    
    // Méthode pour gérer la création de compte
    public function store(Request $request)
    {
        // Validation des données du formulaire de création de compte
        // $request->validate([
        //     'nom' => 'required|string',
        //     'prenom' => 'required|string',
        //     'telphone' => 'required|string',
        //     'role' => 'required|string',
        //     'email' => 'required|email',
        //     'password' => 'required|min:6',
        //     // Ajoutez ici d'autres règles de validation pour les autres champs...
        // ]);
    
        // Création de l'utilisateur
        $responsable = new User();
        $responsable->nom = $request->nom;
        $responsable->prenom = $request->prenom;
        $responsable->telphone = $request->telphone;
        $responsable->role = $request->role;
        $responsable->email = $request->email;
        $responsable->password = bcrypt($request->password);

        // $user->save();

        // Auth::login($user);
        // return redirect()->route('home');


        // $validatedData = $request->validate([
        //     'nom' => 'required|string|max:255',
        //     'prenom' => 'required|string|max:255',
        //     'telphone' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|string|min:8',
        //     // 'departement' => 'required',
        //     'image' => 'image|mimes:jpeg,png,jpg,gif', // Validation pour l'image
        // ]);

        // Traitement de l'image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images');
        }

        // Création d'un nouvel utilisateur responsable
        // $responsable = new User();
        // $responsable->nom = $validatedData['nom'];
        // $responsable->prenom = $validatedData['prenom'];
        // $responsable->telphone = $validatedData['telphone'];
        // $responsable->email = $validatedData['email'];
        // $responsable->password = bcrypt($validatedData['password']);

        // Sauvegarde de l'image si elle a été téléchargée
        if (isset($imagePath)) {
            $responsable->img = $imagePath;
        }

        $responsable->save();

        Auth::login($responsable);
        return redirect()->route('home');
    }

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

    public function membres()
    {
        $user = Auth::user();
        $ville = [];
        if($user->role=="AdminVille"){
            $membres = Membre::whereHas('groupe.section.ville', function($query) use ($user) {
                $query->where('responsable', $user->id)
                    ->orWhere('auteur', $user->id);
            })->get();

            $ville = Ville::where('responsable', auth()->id())->first();

            $sections = $ville->sections;
            foreach ($sections as $section) {
                foreach ($section->groupes as $groupe) {
                    $groupes[] = $groupe;
                }
            }

        }elseif($user->role=="AdminSection") {
            $membres = Membre::whereHas('groupe.section', function($query) use ($user) {
                $query->where('responsable', $user->id)
                      ->orWhere('auteur', $user->id);
            })->get();            
        } elseif($user->role=="AdminGroupe") {
            $membres = Membre::where('groupe_id', $user->groupe_id)->get();
            
        }else{
            $membres = Membre::all();
        }
        // $membres = Membre::where('groupe_id', $user->groupe_id)->get();



        // $villes= Ville::where('auteur', auth()->id())
        //                          ->orwhere('responsable', auth()->id())
        //                          ->get();

        // if($user->role=="AdminVille"){
            
        // }

        // $groupes = Groupe::where('auteur', auth()->id())
        //                           ->orwhere('responsable', auth()->id())
        //                           ->get();
     
        // $sections = Section::where('auteur', auth()->id())
        //                            ->orwhere('responsable', auth()->id())
        //                            ->get();
        return view('association.index', compact('membres', 'groupes', 'sections'));
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
    public function createResponsable($departement)
    {
        $departements = [];
        if ($departement === "ville") {
            $departements = Ville::where('auteur', auth()->id())
                                 ->where('responsable', auth()->id())
                                 ->get();
        } elseif ($departement === 'groupe') {
            $departements = Groupe::where('auteur', auth()->id())
                                  ->where('responsable', auth()->id())
                                  ->get();
        } elseif ($departement === 'section') {
            $departements = Section::where('auteur', auth()->id())
                                   ->where('responsable', auth()->id())
                                   ->get();
        }
        return view('responsables.create', compact('departement', 'departements'));
    }
    


    public function storeResponsable(Request $request, $departement)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telphone' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'departement' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validation pour l'image
        ]);

        // Traitement de l'image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images');
        }

        // Création d'un nouvel utilisateur responsable
        $responsable = new User();
        $responsable->nom = $validatedData['nom'];
        $responsable->prenom = $validatedData['prenom'];
        $responsable->telphone = $validatedData['telphone'];
        $responsable->email = $validatedData['email'];
        $responsable->password = bcrypt($validatedData['password']);

        // Sauvegarde de l'image si elle a été téléchargée
        if (isset($imagePath)) {
            $responsable->img = $imagePath;
        }

        $role = '';
        if ($departement === 'ville') {
            $role = 'AdminVille';
        } elseif ($departement === 'groupe') {
            $role = 'AdminGroupe';
        } elseif ($departement === 'section') {
            $role = 'AdminSection';
        }
        $responsable->role = $role;
        $responsable->save();

        $departementModel = null;
        if ($departement === 'ville') {
            $departementModel = Ville::find($request->departement);
        } elseif ($departement === 'groupe') {
            $departementModel = Groupe::find($request->departement);
            // Mettre à jour la colonne "groupe" de l'utilisateur
            $responsable->groupe_id = $departementModel->id;
            $responsable->save();
        } elseif ($departement === 'section') {
            $departementModel = Section::find($request->departement);
        }

        if ($departementModel) {
            $departementModel->responsable()->associate($responsable);
            $departementModel->save();
        }
        return redirect()->route('association.index', $departement)
        ->with('success', 'Responsable créé avec succès.')
        ->with('success_timeout', now()->addSeconds(1));
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
