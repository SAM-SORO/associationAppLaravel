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
        $groupe = Groupe::find($user->groupe_id);
        $section = Section::find($groupe->section_id);
        $ville = Ville::find($section->ville_id);

        // Récupérer les fonds correspondant à l'auteur de l'utilisateur, de la section ou de la ville
        $fonds = Fonds::where('auteur', $user->id)
                        ->orWhere('auteur', $section->auteur, $section->responsable)
                        ->orWhere('auteur', $ville->auteur, $ville->responsable)
                        ->get();

        return view('paiements.create', compact('membre', 'fonds'));
    }


    //     public function store(Request $request, $membreId)
    // {
    //     $request->validate([
    //         'montant' => 'required|numeric|min:0.01',
    //         'fonds' => 'required|exists:fonds,id',
    //     ]);

    //     $fonds = Fonds::findOrFail($request->fonds);
    //     $paiements = Paiement::where('membre', $membreId)
    //                         ->where('fonds', $fonds->id)
    //                         ->get();

    //     $somme = $paiements->sum('montant') || 0;

    //     if ($somme >= $fonds->montant) {
    //         return redirect()->route('association.index', ['fonds' => $fonds->id])
    //                         ->with('success', 'Fonds déjà soldé pour le membre.')
    //                         ->with('success_timeout', now()->addSeconds(1));
    //     }

    //     $paiement = new Paiement();
    //     $paiement->membre = $membreId;
    //     $paiement->montant = $request->montant;
    //     $paiement->fonds = $fonds->id;

    //     if ($request->montant < ($fonds->montant - $somme)) {
    //         $paiement->mode = 'plusieurs';
    //     } elseif($request->montant >= ($fonds->montant - $somme) && ($fonds->montant - $somme)!= $fonds->montant) {
    //         $paiement->mode = 'un';
    //     }

    //     $paiement->save();

    //     return redirect()->route('association.index', ['fonds' => $paiement->fonds])
    //                     ->with('success', 'Paiement effectué avec succès.')
    //                     ->with('success_timeout', now()->addSeconds(1));
    // }


    public function store(Request $request, $membreId)
    {
        $request->validate([
            'montant' => 'required|numeric|min:0.01',
            'fonds' => 'required|exists:fonds,id',
        ]);


        $fonds = Fonds::findOrFail($request->fonds);
        $paiements = Paiement::where('membre', $membreId)
                            ->where('fonds', $fonds->id)
                            ->get();

        if ($fonds->fin < now()) {
            return redirect()->route('fonds.index')
                                ->with('error', 'La date du fonds est dépassée')
                                ->with('error_timeout', now()->addSeconds(1));
        }
        
        $somme = $paiements->sum('montant');

        // Vérifiez si le fonds est déjà soldé
        if ($somme >= $fonds->montant) {
            return redirect()->route('paiements.showPaiementsMember', ['fonds' => $fonds->id, "membre"=>$membreId])
                            ->with('error', 'Fonds déjà soldé pour le membre.')
                            ->with('error_timeout', now()->addSeconds(1));
        }

        // Vérifiez si un paiement en mode "un" a déjà été effectué
        if ($paiements->where('mode', 'un')->count() > 0) {
            return redirect()->route('paiements.showPaiementsMember', ['fonds' => $fonds->id, "membre"=>$membreId])
                            ->with('error', 'Un paiement unique a déjà été effectué pour ce fonds.')
                            ->with('error_timeout', now()->addSeconds(1));
        }

        $paiement = new Paiement();
        $paiement->membre = $membreId;
        $paiement->montant = $request->montant;
        $paiement->fonds = $fonds->id;

        $reste = $fonds->montant - $somme;

        if ($request->montant == $reste && !$paiements->where('mode', 'plusieurs')->count() > 0) {
            $paiement->mode = 'un';
        } elseif ($request->montant == $reste) {
            $paiement->mode = 'plusieurs';
        } elseif ($request->montant < $reste) {
            $paiement->mode = 'plusieurs';
        }
        else {
            return redirect()->back()
            ->with('error', 'Le montant du paiement dépasse le montant restant qui est de : '.$reste)
            ->with('error_timeout', now()->addSeconds(1));
        }

        $paiement->save();

        return redirect()->route('association.index', ['fonds' => $paiement->fonds])
                        ->with('success', 'Paiement effectué avec succès.')
                        ->with('success_timeout', now()->addSeconds(1));
    }


    public function showPaiementsMember($membreId, $fondsId)
    {
        $membre = Membre::findOrFail($membreId);
        $fonds = Fonds::findOrFail($fondsId);
        $all_member_paiements = Paiement::where('fonds', $fondsId)->get();
        $member_paiements = Paiement::where('membre', $membreId)->where('fonds', $fondsId)->get();
        $member_reste = $fonds->montant - $member_paiements->sum("montant");

        return view('paiements.member_paiement_info', compact(
            'membre', 'member_paiements','fonds',
            'all_member_paiements', 'member_reste',
        ));
    }
    
}


