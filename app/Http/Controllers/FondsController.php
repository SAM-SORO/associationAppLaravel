<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ville;
use App\Models\Section;
use App\Models\Groupe;
use App\Models\Fonds;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class FondsController extends Controller
{
    // Affiche la liste des fonds
    public function index()
    {
        return view('fonds.list');
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
        $fonds->type = $departement;


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

    // Affiche la vue pour le paiement
    public function paiement()
    {
        return view('fonds.paiement');
    }
}
