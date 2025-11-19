<?php

namespace App\Http\Controllers\administrateurs;

use App\Exports\EtudiantsExport;
use App\Http\Controllers\Controller;
use App\Imports\EtudiantsImport;
use Illuminate\Http\Request;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel as ExcelService;
class EtudiantAdministrateurController extends Controller
{
    public function index(Request $request){
        $search = $request->input("search");
        if(isset($search)){
            $etudiants = User::where('nom', 'like', '%' . $search . '%')->paginate(10);
        }else{
            $etudiants = User::paginate(10);
        }
        return view ("administrateurs/etudiants/index" , compact("etudiants"));
    }

    public function importPost(Request $request, ExcelService $excel){
        $request->validate(
            [
                'file' => 'required|file|mimes:csv,txt',
            ],
            [
                'file.required' => 'Le fichier est obligatoire.',
            ]
        );

    $excel->import(new EtudiantsImport, $request->file('file'));

    return back()->with('success', 'Importation réussie !');

    }

    public function exportEtudiant(Request $request){
        return Excel::download(new EtudiantsExport, 'etudiants.csv', \Maatwebsite\Excel\Excel::CSV);
    }

        public function import(Request $request){
        return view('administrateurs/etudiants/import');
    }


}
