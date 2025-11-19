<?php

namespace App\Http\Controllers\administrateurs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel as ExcelService;

use App\Imports\EtudiantsImport;


class DashboardAdministrateurController extends Controller
{
    public function dashoard(Request $request){
        return view('administrateurs/home');
    } 




}
