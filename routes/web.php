<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\fonds;
use App\Http\Controllers\Statistique;
use Illuminate\Support\Facades\Route;

Route::get('/', [admin::class, 'index'])->name('home');

Route::prefix('admin/')->group(function(){

    Route::get('membre/', [admin::class, 'membres'])->name('association.membres');

    Route::get('fonds/', [fonds::class, 'index'])->name('association.fonds');

    Route::get('creer-un fond/', [fonds::class, 'create'])->name('association.create.fonds');

    Route::get('statistiques/', [Statistique::class, 'index'])->name('statistiques');

    Route::get('login/', [admin::class, 'login'])->name('connexion');

    Route::get('register/', [admin::class, 'register'])->name('inscription');

});


//Route::get('admin/Association', [admin::class, 'createMember'])->name('association.createMembre');

// Route::prefix('fonds')->group(function(){
//     Route::get('/', [fonds::class, 'index'])->name('home');
// });
