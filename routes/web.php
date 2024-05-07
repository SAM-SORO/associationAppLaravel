<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FondsController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\VilleController;
use Illuminate\Support\Facades\Route;


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

    //Gestion des membres
    Route::get('membre/', [AdminController::class, 'membres'])->name('association.index');


    // Gestion des fonds
    Route::get('fonds/', [FondsController::class, 'index'])->name('fonds');
    Route::get('fonds/create', [FondsController::class, 'create'])->name('fonds.create');
    Route::get('payer/', [FondsController::class, 'paiement'])->name('payer-cotisation');

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





    //routes pour fonds

    // Route::get('creer-un fond/', [fonds::class, 'create'])->name('create-fonds');


    // //routes pour membres

    Route::get('info-membre/{membre}', [admin::class, 'infoMembre'])->name('info-membre');

    Route::get('ajouter-membre', [admin::class, 'ajouterMembre'])->name('add-membre');
    // Route::post('ajouter-membre', [admin::class, 'ajouterMembre'])->name('add-membre');


    Route::get('modifier-membre/{membre}', [admin::class, 'modifierMembre'])->name('edit-membre');

    Route::get('ajouter-departement}', [admin::class, 'ajouterDepartement'])->name('add-departement');


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
