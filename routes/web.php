<?php

use App\Http\Controllers\administrateurs\AuthAdministrateurController;
use App\Http\Controllers\administrateurs\DashboardAdministrateurController;
use App\Http\Controllers\administrateurs\EtudiantAdministrateurController;
use App\Http\Controllers\administrateurs\FiliereAdministrateurController;
use App\Http\Controllers\administrateurs\FonctionnaireAdministrateurController;
use App\Http\Controllers\administrateurs\RendezVousAdministrateurController;
use App\Http\Controllers\etudiants\AuthEtudiantController;
use App\Http\Controllers\etudiants\DashboardEtudiantController;
use App\Http\Controllers\fonctionnaire\AuthFonctionnaireController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::middleware(["guest:web", "guest:fonctionnaire", "guest:administrateur"])->group(function(){

    Route::prefix("etudiants")->name("etudiants.")->group(function(){
        Route::post('/login', [AuthEtudiantController::class, 'loginPost'])->name('loginPost');
        Route::get('/login', [AuthEtudiantController::class, 'login'])->name('login');
    });


    Route::prefix("fonctionnaires")->name("fonctionnaires.")->group(function(){
        Route::post('/login', [AuthFonctionnaireController::class, 'loginPost'])->name('loginPost');
        Route::get('/login', [AuthFonctionnaireController::class, 'login'])->name('login');
    });



    Route::prefix("administrateurs")->name("administrateurs.")->group(function(){
        Route::post('/login', [AuthAdministrateurController::class, 'loginPost'])->name('loginPost');
        Route::get('/login', [AuthAdministrateurController::class, 'login'])->name('login');
    });

});

//etudiant authenticated
Route::prefix("etudiants")->name("etudiants.")->middleware(["auth:web", "guest:fonctionnaire", "guest:administrateur"])->group(function(){
    Route::get('/home', [DashboardEtudiantController::class, 'dashoard'])->name('home');
    Route::post('/logout', [AuthEtudiantController::class, 'logout'])->name('logout');

});


//admin authenticated
Route::prefix("administrateurs")->name("administrateurs.")->middleware(["guest:web", "guest:fonctionnaire", "auth:administrateur"])->group(function(){
    Route::get('/home', [DashboardAdministrateurController::class, 'dashoard'])->name('home');
    Route::post('/logout', [AuthAdministrateurController::class, 'logout'])->name('logout');

    Route::prefix("filieres")->name("filieres.")->group(function(){
        Route::get('/index', [FiliereAdministrateurController::class, 'index'])->name('index');
        Route::get('/create', [FiliereAdministrateurController::class, 'create'])->name('create');
        Route::post('/store', [FiliereAdministrateurController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [FiliereAdministrateurController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [FiliereAdministrateurController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [FiliereAdministrateurController::class, 'delete'])->name('delete');

        //exportFiliere
        Route::get('exportFiliere', [FiliereAdministrateurController::class, 'exportFiliere'])->name('exportFiliere');

    });


    Route::prefix("fonctionnaires")->name("fonctionnaires.")->group(function(){
        Route::get('/index', [FonctionnaireAdministrateurController::class, 'index'])->name('index');
        Route::get('/create', [FonctionnaireAdministrateurController::class, 'create'])->name('create');
        Route::post('/store', [FonctionnaireAdministrateurController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [FonctionnaireAdministrateurController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [FonctionnaireAdministrateurController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [FonctionnaireAdministrateurController::class, 'delete'])->name('delete');
    });


    Route::prefix("rendezvous")->name("rendezvous.")->group(function(){
        Route::get('/index', [RendezVousAdministrateurController::class, 'index'])->name('index');
        Route::get('/create', [RendezVousAdministrateurController::class, 'create'])->name('create');
        Route::post('/store', [RendezVousAdministrateurController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [RendezVousAdministrateurController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [RendezVousAdministrateurController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [RendezVousAdministrateurController::class, 'delete'])->name('delete');
    });

    Route::prefix("etudiants")->name("etudiants.")->group(function(){
        Route::get('/index', [EtudiantAdministrateurController::class, 'index'])->name('index');
        Route::get('/create', [EtudiantAdministrateurController::class, 'create'])->name('create');
        Route::post('/store', [EtudiantAdministrateurController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [EtudiantAdministrateurController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [EtudiantAdministrateurController::class, 'update'])->name('update');
        Route::delete("/delete/{id}", [EtudiantAdministrateurController::class, 'delete'])->name("delete");

        //exportEtudiant
        Route::get('exportEtudiant', [EtudiantAdministrateurController::class, 'exportEtudiant'])->name('export');


        Route::get('/import', [EtudiantAdministrateurController::class, 'import'])->name('import');
        Route::post("/import", [EtudiantAdministrateurController::class, 'importPost'])->name("importPost");
    });

});
