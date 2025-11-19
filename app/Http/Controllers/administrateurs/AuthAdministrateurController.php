<?php

namespace App\Http\Controllers\administrateurs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthAdministrateurController extends Controller
{
        public function login(Request $request)
    {
        
        return view('administrateurs/login');
    }

    public function loginPost(Request $request)
    {

        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'L\'email est obligatoire.',
                'email.email' => 'Veuillez entrer un email valide.',
                'password.required' => 'Le mot de passe est obligatoire.',
            ]
        );

        if (
            Auth::guard('administrateur')->attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ])
        ) {
            // Regenerate session to prevent fixation
            $request->session()->regenerate();

            return redirect()->route('administrateurs.home');
        }


        return back()->withErrors([
            'email' => 'Les informations d\'identification ne correspondent pas.',
        ])->withInput();
    }


public function logout(Request $request)
{
    
    Auth::guard("administrateur")->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('home');
}

}
