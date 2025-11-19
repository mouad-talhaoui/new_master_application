<?php

namespace App\Http\Controllers\etudiants;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthEtudiantController extends Controller
{
    public function login(Request $request)
    {
        return view('etudiants/login');
    }

    public function loginPost(Request $request)
    {
        
        $request->validate(
            [
                'cin' => 'required',
                'cne' => 'required',
            ],
            [
                'cin.required' => 'Le CIN est obligatoire.',
                'cne.required' => 'Le CNE est obligatoire.',
            ]
        );

        
        $etudiant = User::where('cin', $request->input('cin'))
            ->where('cne', $request->input('cne'))
            ->first();

        if ($etudiant) {
            
            Auth::login($etudiant);
            $request->session()->regenerate();

            return redirect()->route('etudiants.home');
        }

        
        return back()->withErrors([
            'cin' => 'CIN ou CNE incorrect.',
        ])->withInput();
    }


    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }


}
