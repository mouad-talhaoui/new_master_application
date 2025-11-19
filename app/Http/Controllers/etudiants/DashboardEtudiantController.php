<?php

namespace App\Http\Controllers\etudiants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardEtudiantController extends Controller
{
    public function dashoard(Request $request){
        return view('etudiants/home');
    } 
}
