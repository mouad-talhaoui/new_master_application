@extends("layouts/base")

@section("content")

<div class="bg-blue-50 flex items-center justify-center min-h-screen">

    <div class="text-center">
        <!-- Logo -->
        <img src="{{ asset('logos/logo.png') }}" alt="Logo" class="mx-auto w-32 h-32 mb-8">

        <!-- Buttons -->
        <div class="space-y-4">
            <a href="{{ route('administrateurs.fonctionnaires.index') }}" 
               class="block bg-blue-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-600 transition">
               Gestion des Fonctionnaires
            </a>

            <a href="{{ route('administrateurs.filieres.index') }}" 
               class="block bg-green-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-green-600 transition">
               Gestion Filière
            </a>

            <a href="{{ route('administrateurs.rendezvous.index') }}" 
               class="block bg-purple-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-purple-600 transition">
               Gestion Rendez-vous
            </a>

            <a href="{{ route('administrateurs.etudiants.index') }}" 
               class="block bg-blue-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-600 transition">
               Gestion des etudiants
            </a>
        </div>
    </div>
    

</div>

@endsection
