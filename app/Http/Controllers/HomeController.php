<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request){
        
            if(Auth::guard("web")->check()){
                return redirect()->route("etudiants.home");
            }else if(Auth::guard("administrateur")->check()){
                return redirect()->route("administrateurs.home");
            }else if(Auth::guard("web")->check()){
                return redirect()->route('fonctionnaires.home');
            }
            return redirect()->route('etudiants.login');
    }
}
