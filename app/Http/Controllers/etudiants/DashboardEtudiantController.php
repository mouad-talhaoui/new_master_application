<?php

namespace App\Http\Controllers\etudiants;

use App\Http\Controllers\Controller;
use App\Models\Rdv;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class DashboardEtudiantController extends Controller
{
    public function dashoard(Request $request)
    {
        $filieres = Auth::guard("web")->user()->filieres();

        return view('etudiants/home', compact("filieres"));
    }

    public function rdvPost(Request $request)
    {
        $request->validate(
            ["date" => "required"]
        );

        $etudiant = User::where('id', $request->user()->id)->first();
        $rdv = Rdv::where('date', $request->input('date'))->first();
        $etudiant->id_rdv = $rdv->id;
        $etudiant->save();

        return redirect()->route('etudiants.home');

    }

    public function rdvDownload(Request $request)
    {
        $data = [
            'nom' => Auth::guard("web")->user()->nom,
            'prenom' => Auth::guard("web")->user()->prenom,
            'cin' => '',
            'filiere' => '',
            'cne' => '',
            'date' => '',
            'heure' => '',
            'salle' => ''
        ];

        $pdf = PDF::loadView('etudiants.pdf.rdv', ['data' => $data]);
        return $pdf->download('rdv.pdf');
    }


}
