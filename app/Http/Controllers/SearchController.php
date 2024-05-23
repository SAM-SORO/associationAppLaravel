<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use App\Models\Ville;
use App\Models\Section;
use App\Models\Groupe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Récupérer le type de département (ville, section, groupe)
        $departementType = $request->input('departement_type');
        // Récupérer l'ID du département sélectionné
        $departementId = $request->input('departement_id');
        // Récupérer le terme de recherche
        $searchTerm = $request->input('query');

        // Vérifier les paramètres requis
        if (!$departementType || !$departementId || !$searchTerm) {
            return response()->json(['error' => 'Paramètres manquants'], 400);
        }

        // Déterminer le modèle à utiliser en fonction du type de département sélectionné
        switch ($departementType) {
            case 'ville':
                $departementModel = Ville::find($departementId);
                break;
            case 'section':
                $departementModel = Section::find($departementId);
                break;
            case 'groupe':
                $departementModel = Groupe::find($departementId);
                break;
            default:
                return response()->json(['error' => 'Type de département non valide'], 400);
        }

        // Vérifier si le modèle du département existe
        if (!$departementModel) {
            return response()->json(['error' => 'Département introuvable'], 404);
        }

        // Récupérer les membres en fonction du département et du terme de recherche
        $results = Membre::where(function ($q) use ($searchTerm) {
                            $q->where('nom', 'LIKE', '%' . $searchTerm . '%')
                              ->orWhere('prenom', 'LIKE', '%' . $searchTerm . '%');
                        })
                        ->whereHas($departementType, function ($q) use ($departementId) {
                            $q->where('id', $departementId);
                        })
                        ->get();

        return response()->json($results);
    }
}



