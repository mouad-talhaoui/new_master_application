<?php

namespace App\Http\Controllers\administrateurs;

use App\Http\Controllers\Controller;
use App\Models\Filiere;
use App\Models\Rdv;
use Illuminate\Http\Request;

class RendezVousAdministrateurController extends Controller
{

    public function index(Request $request)
    {
        $rdvs = Rdv::paginate(10);
        return view('administrateurs/rdv/index', compact("rdvs"));
    }

    public function create(Request $request)
    {
        return view('administrateurs/rdv/create');
    }

public function store(Request $request)
{
    $request->validate(
        [
            'date' => 'required',
            'nombre_d_etudiant' => 'required|integer|min:1',
            'id_filiere' => 'required|exists:filieres,id',
        ],
        [
            'date.required' => 'La date du RDV est obligatoire.',
            'nombre_d_etudiant.required' => 'Le nombre d\'étudiants est obligatoire.',
            'id_filiere.required' => 'La filière est obligatoire.',
            'id_filiere.exists' => 'La filière sélectionnée est invalide.',
        ]
    );

    $rdv = new Rdv();
    $rdv->date = \Carbon\Carbon::parse($request->date)->format('Y-m-d');
    $rdv->nombre_d_etudiant = $request->nombre_d_etudiant;
    $rdv->filiere_id = $request->id_filiere;
    $rdv->save();

    return redirect()->route('administrateurs.rendezvous.index')->with('success', 'RDV créé avec succès.');
}

    public function edit(Request $request, $id)
    {
        $rdv = Rdv::find($id);
        return view('administrateurs/rdv/edit', compact("rdv"));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nom_complet' => 'required',
                'abbreviation' => 'required',
                'id' => 'required',
            ],
        );


        $rdv = Rdv::find($id);
        $rdv->nom_complet = $request->input("nom_complet");
        $rdv->abreviation = $request->input("abbreviation");
        $rdv->save();
        return redirect()->route('administrateurs.rendezvous.index');
    }

    public function delete(Request $request, $id)
    {
        $rdv = Rdv::find($id);
        $rdv->delete();
        return redirect()->route('administrateurs.rendezvous.index');
    }



}
