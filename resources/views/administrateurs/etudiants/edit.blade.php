@extends("layouts/base")

@section("content")

<div class="bg-blue-50 min-h-screen py-10 px-4">

    <div class="text-center mb-10">
        <!-- Logo -->
        <img src="{{ asset('logos/logo.png') }}" alt="Logo" class="mx-auto w-32 h-32 mb-8">
        
        <h1 class="text-2xl font-bold text-blue-700">Modifier l'etudiant</h1>
    </div>

    <!-- Formulaire de création -->
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('administrateurs.etudiants.update', $etudiant->id) }}" method="POST" class="space-y-4">
            @csrf

            <!-- Abréviation -->
             <input type="hidden" name="id" value="{{ $etudiant->id }}"/>
            <div>
                <label for="nom" class="block text-left font-medium text-gray-700">Nom</label>
                <input type="text" name="nom" id="nom" value="{{ $etudiant->nom }}"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Ex: PLPJ" required>
                @error('nom')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nom complet -->
            <div>
                <label for="prenom" class="block text-left font-medium text-gray-700">prenom</label>
                <input type="text" name="prenom" id="prenom" value="{{ $etudiant->prenom }}"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       placeholder="nom complet de la filière" required>
                @error('prenom')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nom complet -->
            <div>
                <label for="cin" class="block text-left font-medium text-gray-700">cin</label>
                <input type="text" name="cin" id="cin" value="{{ $etudiant->cin }}"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       placeholder="nom complet de la filière" required>
                @error('cin')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            <!-- Nom complet -->
            <div>
                <label for="cne" class="block text-left font-medium text-gray-700">cne</label>
                <input type="text" name="cne" id="cne" value="{{ $etudiant->cne }}"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       placeholder="nom complet de la filière" required>
                @error('cne')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit button -->
            <div>
                <button type="submit" 
                        class="w-full bg-blue-500 text-white font-semibold px-4 py-2 rounded-md hover:bg-blue-600 transition">
                    Modifier étudiant
                </button>
            </div>
        </form>
    </div>

</div>

@endsection
