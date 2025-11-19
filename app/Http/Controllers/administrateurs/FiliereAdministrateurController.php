<?php

namespace App\Http\Controllers\administrateurs;

use App\Exports\FilieresExport;
use App\Http\Controllers\Controller;
use App\Models\Filiere;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FiliereAdministrateurController extends Controller
{
    public function index(Request $request){
        $filieres = Filiere::paginate(10);
        return view('administrateurs/filieres/index', compact("filieres"));
    }

    public function create(Request $request){
        return view('administrateurs/filieres/create');
    }

    public function store(Request $request){
        $request->validate(
            [
                'nom_complet' => 'required',
                'abbreviation' => 'required',
            ],
            [
                'nom_complet.required' => 'Le nom de la filière est obligatoire.',
                'abreviation.required' => 'L\'abréviation de la filière est obligatoire.',
            ]
        );

        Filiere::create(["nom_complet" => $request->input("nom_complet"), "abreviation" => $request->input("abbreviation")]);
        return redirect()->route('administrateurs.filieres.index');
    }

    public function edit(Request $request, $id){
        $filiere = Filiere::find($id);
        return view('administrateurs/filieres/edit', compact("filiere"));
    }

    public function update(Request $request, $id){
        $request->validate(
            [
                'nom_complet' => 'required',
                'abbreviation' => 'required',
                'id' => 'required',
            ],
        );

        
        $filiere = Filiere::find($id);
        $filiere->nom_complet = $request->input("nom_complet");
        $filiere->abreviation = $request->input("abbreviation");
        $filiere->save();
        return redirect()->route('administrateurs.filieres.index');
    }

    public function delete(Request $request, $id){
        $filiere = Filiere::find($id);
        $filiere->delete();
        return redirect()->route('administrateurs.filieres.index');
    }



    public function exportFiliere(Request $request){
            return Excel::download(new FilieresExport, 'filieres.csv', \Maatwebsite\Excel\Excel::CSV);
    }



}
