<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fonds;
use App\Models\Membre;
use App\Models\Paiement;
use Illuminate\Support\Facades\Auth;
use App\Models\Section;
use App\Models\Ville;
use App\Models\Groupe;


class PaiementController extends Controller
{
    public function index()
    {
        $paiements = Paiement::with(['fonds', 'membre'])->get();
        return view('paiements.list', compact('paiements'));
    }

    public function create($membreId)
    {
        $user = Auth::user();
        // Récupérer les membres du même groupe que l'utilisateur connecté
        $membre = Membre::find($membreId);

        // Récupérer la section et la ville associées à l'utilisateur connecté
        $groupe = Groupe::find($user->id);
        $section = Section::find($groupe->section_id);
        $ville = Ville::find($section->ville_id);

        // Récupérer les fonds correspondant à l'auteur de l'utilisateur, de la section ou de la ville
        $fonds = Fonds::where('auteur', $user->id)
                        ->orWhere('auteur', $section->auteur)
                        ->orWhere('auteur', $ville->auteur)
                        ->get();

        return view('paiements.create', compact('membre', 'fonds'));
    }

    public function store(Request $request, $membreId)
    {
        // $request->validate([
        //     'montant' => 'required|numeric',
        //     'fonds' => 'required|exists:fonds,id',
        // ]);

        $paiement = new Paiement();
        $paiement->membre = $membreId;
        $paiement->montant = $request->montant;
        // $paiement->fonds = $request->fonds;

        $fonds = Fonds::find($request->fonds);
        $paiement->fonds = $fonds->id;

        if ($request->montant < $fonds->montant) {
            $paiement->mode = 'plusieurs';
        } else {
            $paiement->mode = 'un';
        }
        
        $paiement->save();

        return redirect()->route('association.index', ['fonds' => $paiement->fonds])->with('success', 'Paiement effectué avec succès.')->with('success_timeout', now()->addSeconds(1));;
    }
}


