<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membre;
// class FilterController extends Controller
// {
//     public function filter(Request $request)
//     {
//         $query = Membre::query();

//         if ($request->has('ville')) {
//             $villeId = $request->input('ville');
//             $query->whereHas('groupe.section.ville', function($q) use ($villeId) {
//                 $q->where('id', $villeId);
//             });
//         }

//         if ($request->has('section')) {
//             $sectionId = $request->input('section');
//             $query->whereHas('groupe.section', function($q) use ($sectionId) {
//                 $q->where('id', $sectionId);
//             });
//         }

//         if ($request->has('groupe')) {
//             $groupeId = $request->input('groupe');
//             $query->where('groupe_id', $groupeId);
//         }

//         // Ajoutez d'autres filtres selon vos besoins


// //         $query = Membre::query();

// // if ($request->has('ville')) {
// //     $villeId = $request->input('ville');
// //     $query->whereHas('groupe.section.ville', function($q) use ($villeId) {
// //         $q->where('id', $villeId);
// //     });
// // }

// // if ($request->has('section')) {
// //     $sectionId = $request->input('section');
// //     $query->where(function($q) use ($sectionId) {
// //         $q->whereHas('groupe.section', function($q) use ($sectionId) {
// //             $q->where('id', $sectionId);
// //         })->orWhere('section_id', $sectionId); // Récupère également les membres directement liés à la section
// //     });
// // }

// // if ($request->has('groupe')) {
// //     $groupeId = $request->input('groupe');
// //     $query->where(function($q) use ($groupeId) {
// //         $q->where('groupe_id', $groupeId)->orWhereHas('groupe', function($q) use ($groupeId) {
// //             $q->where('id', $groupeId);
// //         });
// //     });
// // }

// // $membres = $query->get();


//         $results = $query->get();

//         return response()->json($results);
//     }
// }



class FilterController extends Controller
{
    public function filter(Request $request)
    {
        $query = Membre::query();

        if ($request->filled('ville')) {
            $villeId = $request->input('ville');
            $query->whereHas('groupe.section.ville', function($q) use ($villeId) {
                $q->where('id', $villeId);
            });
        }

        if ($request->filled('section')) {
            $sectionId = $request->input('section');
            $query->whereHas('groupe.section', function($q) use ($sectionId) {
                $q->where('id', $sectionId);
            });
        }

        if ($request->filled('groupe')) {
            $groupeId = $request->input('groupe');
            $query->where('groupe_id', $groupeId);
        }

        $result = $query->get();

        return response()->json($result);
    }
}