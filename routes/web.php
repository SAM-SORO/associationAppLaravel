<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\fonds;
use App\Http\Controllers\Statistique;
use App\Http\Controllers\Membre;
use Illuminate\Support\Facades\Route;


//route vers le dashbord
Route::get('/', [admin::class, 'index'])->name('home');

Route::prefix('admin/')->group(function(){

    //routes pour fonds

    Route::get('fonds/', [fonds::class, 'index'])->name('fonds');

    Route::get('creer-un fond/', [fonds::class, 'create'])->name('create-fonds');

    //routes pour les statistiques

    Route::get('statistiques/', [Statistique::class, 'index'])->name('statistiques');

    //routes pour membres

    Route::get('membre/', [admin::class, 'membres'])->name('membres');

    Route::get('info-membre/{membre}', [admin::class, 'infoMembre'])->name('info-membre');

    Route::get('ajouter-membre}', [admin::class, 'ajouerMembre'])->name('add-membre');

    Route::get('modifier-membre/{membre}', [admin::class, 'modifierMembre'])->name('edit-membre');

    //routes pour responsable

    Route::get('responsable/', [admin::class, 'responsables'])->name('responsables');

    Route::get('info-responsable/{responsable}', [admin::class, 'infoResponsable'])->name('info-responsable');

    Route::get('ajouter-responsable}', [admin::class, 'ajouterResponsable'])->name('add-responsable');

    Route::get('modifier-responsable/{responsable}', [admin::class, 'modifierResponsable'])->name('edit-responsable');

    //routes de connexion

    Route::get('login/', [admin::class, 'login'])->name('connexion');

    Route::get('recupered-password/', [admin::class, 'passwordForgot'])->name('connexion');


    //Route::get('register/', [admin::class, 'register'])->name('inscription');
    Route::post('{id_groupe}/register_membre', [Membre::class, 'create_member'])
    ->name('association.register_membre');

    Route::get('register_membre/', [admin::class, 'createMember'])->name('association.membre');// to manage later, btn association page

});


//Route::get('admin/Association', [admin::class, 'createMember'])->name('association.createMembre');

// Route::prefix('fonds')->group(function(){
//     Route::get('/', [fonds::class, 'index'])->name('home');
// });
