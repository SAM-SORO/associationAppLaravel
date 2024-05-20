<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membre;
class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = Membre::query();

        if ($request->has('ville')) {
            $villeId = $request->input('ville');
            $query->whereHas('groupe.section.ville', function($q) use ($villeId) {
                $q->where('id', $villeId);
            });
        }

        if ($request->has('section')) {
            $sectionId = $request->input('section');
            $query->whereHas('groupe.section', function($q) use ($sectionId) {
                $q->where('id', $sectionId);
            });
        }

        if ($request->has('groupe')) {
            $groupeId = $request->input('groupe');
            $query->where('groupe_id', $groupeId);
        }

        // Ajoutez d'autres filtres selon vos besoins

        $results = $query->get();

        return response()->json($results);
    }
}
