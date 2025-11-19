<?php

namespace App\Http\Controllers\administrateurs;

use App\Http\Controllers\Controller;
use App\Models\Fonctionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FonctionnaireAdministrateurController extends Controller
{
    public function index(Request $request){
        $fonctionnaires = Fonctionnaire::paginate(10);
        return view('administrateurs/fonctionnaires/index', compact('fonctionnaires'));
    }
public function create(Request $request){
        return view('administrateurs/fonctionnaires/create');
    }


public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'email' => 'required|email|unique:fonctionnaires,email',
        'password' => 'required|confirmed|min:6',
    ]);

    // Create the fonctionnaire
    Fonctionnaire::create([
        'nom' => $request->input('nom'),
        'prenom' => $request->input('prenom'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')), // Hash the password
    ]);

    return redirect()->route('administrateurs.fonctionnaires.index')
                     ->with('success', 'Fonctionnaire ajouté avec succès!');
}

    public function edit(Request $request, $id){
        $fonctionnaire = Fonctionnaire::find($id);
        return view('administrateurs/fonctionnaires/edit', compact("fonctionnaire"));
    }

    public function update(Request $request, $id){
         $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'email' => 'required|email|unique:fonctionnaires,email',
        'password' => 'required|confirmed|min:6',
    ]);

        
        $fonctionnaire = Fonctionnaire::find($id);
        $fonctionnaire->nom = $request->input("nom");
        $fonctionnaire->prenom = $request->input("prenom");
        $fonctionnaire->email = $request->input("email");
        $fonctionnaire->password = $request->input("password");
        $fonctionnaire->save();
        return redirect()->route('administrateurs.fonctionnaires.index');
    }

    public function delete(Request $request, $id){
        $fonctionnaire = Fonctionnaire::find($id);
        $fonctionnaire->delete();
        return redirect()->route('administrateurs.fonctionnaires.index');
    }



}
