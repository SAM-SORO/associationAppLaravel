<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ville;
use App\Models\Section;
use App\Models\Groupe;
use App\Models\Fonds;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Paiement;
use App\Models\Membre;


class FondsController extends Controller
{

    // Affiche les détails d'un fonds spécifique
    public function show($id)
    {
        // Récupérer le fonds avec l'auteur et les membres associés
        $fonds = Fonds::with(['auteur', 'membres'])->findOrFail($id);
        $nombreMembres = $fonds->membres->count();

        $all_member_paiements = Paiement::where('fonds', $id)->get();

        return view('fonds.show', compact('fonds', 'nombreMembres', "all_member_paiements"));
    }
    // Affiche la liste des fonds
    public function index()
    {

    $user = Auth::user();
    
    $groupe = Groupe::find($user->id);
    $section = Section::find($groupe->section_id);
    $ville = Ville::find($section->ville_id);

    // Récupérer les fonds correspondant à l'auteur de l'utilisateur, de la section ou de la ville
    $fonds = Fonds::where('auteur', $user->id)
    ->orWhere('auteur', $section->auteur)
    ->orWhere('auteur', $ville->auteur)
    ->get();

    return view('fonds.liste', compact( 'fonds'));
    }

    // Affiche le formulaire de création de fonds
    public function create($departement)
    {
        $departements = [];
        if ($departement === "ville") {
            $departements = Ville::where('auteur', auth()->id())
                                 ->whereNull('auteur')
                                 ->get();
        } elseif ($departement === 'groupe') {
            $departements = Groupe::where('auteur', auth()->id())
                                  ->orwhereNull('auteur')
                                  ->get();
        } elseif ($departement === 'section') {
            $departements = Section::where('auteur', auth()->id())
                                   ->orwhereNull('auteur')
                                   ->get();
        }

        return view('fonds.create', compact('departement', 'departements'));
    }

    // Stocke un nouveau fond dans la base de données
    public function store(Request $request, $departement)
    {
        // Validation des données
        $request->validate([
            'label' => 'required|string|max:255',
            'montant' => 'required|integer',
            'debut' => 'required|date',
            'fin' => 'required|date|after_or_equal:debut',
            'desc' => 'required|string', // Assurez-vous que la validation est appropriée pour ce champ
        ]);

        // Création du fonds
        $fonds = new Fonds();
        $fonds->label = $request->label;
        $fonds->montant = $request->montant;
        $fonds->debut = $request->debut;
        $fonds->fin = $request->fin;
        $fonds->auteur = Auth::user()->id; // Assuming 'auteur' is optional
        $fonds->description = $request->desc;
        $fonds->departement_nom = $departement;

        $departementModel = null;
        if ($departement === 'ville') {
            $departementModel = Ville::find($request->departement);
        } elseif ($departement === 'groupe') {
            $departementModel = Groupe::find($request->departement);
        } elseif ($departement === 'section') {
            $departementModel = Section::find($request->departement);
        }

        if ($departementModel) {
        $fonds->departement_id = $departementModel->id;
            $departementModel->save();
        }

        // Sauvegarde du fonds dans la base de données
        $fonds->save();

        // Redirection avec un message flash
        return redirect()->route("association.index")->with('success', 'Fonds créé avec succès.')->with('success_timeout', now()->addSeconds(1));
    }

    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'label' => 'required|string|max:255',
            'montant' => 'required|integer',
            'debut' => 'required|date',
            'fin' => 'required|date|after_or_equal:debut',
            'desc' => 'required|string', // Assurez-vous que la validation est appropriée pour ce champ
        ]);

        // Trouve et met à jour le fonds
        $fonds = Fonds::findOrFail($id);
        $fonds->label = $request->label;
        $fonds->montant = $request->montant;
        $fonds->debut = $request->debut;
        $fonds->fin = $request->fin;
        $fonds->description = $request->desc;

        if ($fonds->departement_nom === 'ville') {
            $fonds->departement_id = Ville::find($request->departement)->id;
        } elseif ($fonds->departement_nom === 'groupe') {
            $fonds->departement_id = Groupe::find($request->departement)->id;
        } elseif ($fonds->departement_nom === 'section') {
            $fonds->departement_id = Section::find($request->departement)->id;
        }

        $fonds->save();

        // Redirection avec un message flash
        return redirect()->route("association.index")->with('success', 'Fonds mis à jour avec succès.')->with('success_timeout', now()->addSeconds(1));
    }

    public function edit($id)
    {
        $fonds = Fonds::findOrFail($id);
        $departements = [];
        if ($fonds->departement_nom === "ville") {
            $departements = Ville::where('auteur', auth()->id())
                                 ->orWhereNull('auteur')
                                 ->get();
        } elseif ($fonds->departement_nom === 'groupe') {
            $departements = Groupe::where('auteur', auth()->id())
                                  ->orWhereNull('auteur')
                                  ->get();
        } elseif ($fonds->departement_nom === 'section') {
            $departements = Section::where('auteur', auth()->id())
                                   ->orWhereNull('auteur')
                                   ->get();
        }

        return view('fonds.edit', compact('fonds', 'departements'));
    }

    public function destroy($id)
    {
        $fonds = Fonds::findOrFail($id);
        $fonds->delete();

        // Redirection avec un message flash
        return redirect()->route("association.index")->with('success', 'Fonds supprimé avec succès.')->with('success_timeout', now()->addSeconds(1));
    }


    public function showPaiementsMember($fondsId)
    {
        $fonds = Fonds::with('auteur')->findOrFail($fondsId);
        $membres = Membre::where('groupe_id', $fonds->departement_id)->get();
        
        // Pour chaque membre, calculez le montant restant à payer
        foreach ($membres as $membre) {
            $totalPaiements = Paiement::where('fonds', $fondsId)
                                    ->where('membre', $membre->id)
                                    ->sum('montant');
            $membre->reste = $fonds->montant - $totalPaiements;
        }

        return view('fonds.liste_membre_pay', compact('fonds', 'membres'));
    }

}
