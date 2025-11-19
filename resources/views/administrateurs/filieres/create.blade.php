@extends("layouts/base")

@section("content")

<div class="bg-blue-50 min-h-screen py-10 px-4">

    <div class="text-center mb-10">
        <!-- Logo -->
        <img src="{{ asset('logos/logo.png') }}" alt="Logo" class="mx-auto w-32 h-32 mb-8">
        
        <h1 class="text-2xl font-bold text-blue-700">Créer une nouvelle filière</h1>
    </div>

    <!-- Formulaire de création -->
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('administrateurs.filieres.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Abréviation -->
            <div>
                <label for="abbreviation" class="block text-left font-medium text-gray-700">Abréviation</label>
                <input type="text" name="abbreviation" id="abbreviation" value="{{ old('abbreviation') }}"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Ex: PLPJ" required>
                @error('abbreviation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nom complet -->
            <div>
                <label for="nom_complet" class="block text-left font-medium text-gray-700">Nom complet</label>
                <input type="text" name="nom_complet" id="nom_complet" value="{{ old('nom_complet') }}"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       placeholder="nom complet de la filière" required>
                @error('nom_complet')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit button -->
            <div>
                <button type="submit" 
                        class="w-full bg-blue-500 text-white font-semibold px-4 py-2 rounded-md hover:bg-blue-600 transition">
                    Créer la filière
                </button>
            </div>
        </form>
    </div>

</div>

@endsection
