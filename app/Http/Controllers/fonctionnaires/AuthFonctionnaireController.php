<?php

namespace App\Http\Controllers\fonctionnaire;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthFonctionnaireController extends Controller
{
        public function login(Request $request)
    {
        return view('fonctionnaires/login');
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
            Auth::guard('fonctionnaire')->attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ])
        ) {
            // Regenerate session to prevent fixation
            $request->session()->regenerate();

            return redirect()->route('fonctionnaires.home');
        }


        return back()->withErrors([
            'email' => 'Les informations d\'identification ne correspondent pas.',
        ])->withInput();
    }


public function logout(Request $request)
{
    
    Auth::guard("fonctionnaire")->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('home');
}

}
