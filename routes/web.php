<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FondsController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\VilleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\SearchController;


//route vers le dashbord
Route::get('/', [AdminController::class, 'index'])->name('home');

Route::prefix('admin/')->group(function(){
    // Gestion des Villes
    Route::get('/villes', [VilleController::class, 'index'])->name('villes.index');
    Route::get('/villes/create', [VilleController::class, 'create'])->name('villes.create');
    Route::post('/villes', [VilleController::class, 'store'])->name('villes.store');
    Route::get('/villes/{id}', [VilleController::class, 'show'])->name('villes.show');
    Route::get('/villes/{id}/edit', [VilleController::class, 'edit'])->name('villes.edit');
    Route::put('/villes/{id}', [VilleController::class, 'update'])->name('villes.update');
    Route::delete('/villes/{id}', [VilleController::class, 'destroy'])->name('villes.destroy');

    // Gestion des Sections
    Route::get('/sections', [SectionController::class, 'index'])->name('sections.index');
    Route::get('/sections/create', [SectionController::class, 'create'])->name('sections.create');
    Route::post('/sections', [SectionController::class, 'store'])->name('sections.store');
    Route::get('/sections/{id}', [SectionController::class, 'show'])->name('sections.show');
    Route::get('/sections/{id}/edit', [SectionController::class, 'edit'])->name('sections.edit');
    Route::put('/sections/{id}', [SectionController::class, 'update'])->name('sections.update');
    Route::delete('/sections/{id}', [SectionController::class, 'destroy'])->name('sections.destroy');

    //Gestion du groupe
    Route::get('/groupes', [GroupeController::class, 'index'])->name('groupes.index');
    Route::get('/groupes/create', [GroupeController::class, 'create'])->name('groupes.create');
    Route::post('/groupes', [GroupeController::class, 'store'])->name('groupes.store');
    Route::get('/groupes/{id}', [GroupeController::class, 'show'])->name('groupes.show');
    Route::get('/groupes/{id}/edit', [GroupeController::class, 'edit'])->name('groupes.edit');
    Route::put('/groupes/{id}', [GroupeController::class, 'update'])->name('groupes.update');
    Route::delete('/groupes/{id}', [GroupeController::class, 'destroy'])->name('groupes.destroy');

    // Gestion des membres
    Route::get('membres/actions', [AdminController::class, 'membres'])->name('association.index');
    Route::get('membre/create', [MembreController::class, 'create'])->name('membre.create');
    Route::post('/membres', [MembreController::class, 'store'])->name('membre.store');
    Route::get('/membre/{id}', [MembreController::class, 'show'])->name('membre.show');  
    Route::get('/membre/{id}/edit', [MembreController::class, 'edit'])->name('membre.edit');
    Route::put('/membre/{id}', [MembreController::class, 'update'])->name('membre.update');
    Route::delete('/membre/{id}/destroy', [MembreController::class, 'destroy'])->name('membre.destroy');

    // Gestion des fonds
    Route::get('fonds/', [FondsController::class, 'index'])->name('fonds.index');
    Route::get('fonds/{departement}/create', [FondsController::class, 'create'])->name('fonds.create');
    Route::post('fonds/{departement}/create', [FondsController::class, 'store'])->name('fonds.store');
    Route::get('fonds/{id}/edit', [FondsController::class, 'edit'])->name('fonds.edit');
    Route::put('fonds/{id}', [FondsController::class, 'update'])->name('fonds.update');
    Route::delete('fonds/{id}', [FondsController::class, 'destroy'])->name('fonds.destroy');

    // gestion des payements
    Route::get('paiements', [PaiementController::class, 'index'])->name('paiements.index');
    Route::get('paiements/{membreId}/create', [PaiementController::class, 'create'])->name('paiements.create');
    Route::post('paiements/{membreId}/create', [PaiementController::class, 'store'])->name('paiements.store');
    Route::get('paiements/{membre}/fonds/{fonds}', [PaiementController::class, 'showPaiementsMember'])->name('paiements.showPaiementsMember');

    
    // Gestion des statistiques
    Route::get('statistiques/', [StatistiqueController::class, 'index'])->name('statistiques');

    // Gestion des auth
    Route::get('login/', [AdminController::class, 'loginForm'])->name('auth.loginForm');
    Route::post('login/', [AdminController::class, 'login'])->name('auth.login');
    Route::post('register/', [AdminController::class, 'store'])->name('auth.store');
    Route::get('register/', [AdminController::class, 'create'])->name('auth.create');
    Route::get('logout', [AdminController::class, 'logout'])->name('auth.logout');

    // Gestion des responsable
    Route::get('responsable/{departement}/create', [AdminController::class, 'createResponsable'])->name('responsable.create');
    Route::post('responsable/{departement}/create', [AdminController::class, 'storeResponsable'])->name('responsable.store');


    Route::get('filtre/', [FilterController::class, 'filter'])->name('filter');
    Route::get('search/', [SearchController::class, 'search'])->name('search');




    //routes pour fonds

    // Route::get('creer-un fond/', [fonds::class, 'create'])->name('create-fonds');


    // //routes pour membres

    // Route::get('info-membre/{membre}', [admin::class, 'infoMembre'])->name('info-membre');

    // // Route::post('ajouter-membre', [admin::class, 'ajouterMembre'])->name('add-membre');


    // Route::get('modifier-membre/{membre}', [admin::class, 'modifierMembre'])->name('edit-membre');

    // Route::get('ajouter-departement}', [admin::class, 'ajouterDepartement'])->name('add-departement');


    // //routes pour responsable

    // Route::get('responsable/', [admin::class, 'responsables'])->name('responsables');

    // Route::get('info-responsable/{responsable}', [admin::class, 'infoResponsable'])->name('info-responsable');

    // Route::get('ajouter-responsable}', [admin::class, 'ajouterResponsable'])->name('add-responsable');

    // Route::get('modifier-responsable/{responsable}', [admin::class, 'modifierResponsable'])->name('edit-responsable');

    // //routes de connexion


    // Route::get('recupered-password/', [admin::class, 'passwordForgot'])->name('connexion');


    // //Route::get('register/', [admin::class, 'register'])->name('inscription');
    // Route::post('{id_groupe}/register_membre', [Membre::class, 'create_member'])
    // ->name('association.register_membre');


    // Route::get('register_membre/', [admin::class, 'createMember'])->name('association.membre');// to manage later, btn association page

});


//Route::get('admin/Association', [admin::class, 'createMember'])->name('association.createMembre');

// Route::prefix('fonds')->group(function(){
//     Route::get('/', [fonds::class, 'index'])->name('home');
// });
