@extends("layouts/base")

@section("content")

<div class="bg-blue-50 min-h-screen py-10 px-4">

    <div class="text-center mb-10">
        <!-- Logo -->
        <img src="{{ asset('logos/logo.png') }}" alt="Logo" class="mx-auto w-32 h-32 mb-8">
        
        <h1 class="text-2xl font-bold text-blue-700">Import des etudiants</h1>
    </div>

    <!-- Formulaire de création -->
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('administrateurs.etudiants.importPost') }}"  enctype="multipart/form-data" method="POST" class="space-y-4">
            @csrf


            <!-- Nom complet -->
            <div>
                <label for="file" class="block text-left font-medium text-gray-700">Fichier</label>
                <input type="file" name="file" id="file" value="{{ old('file') }}"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       placeholder="fichier" required>
                @error('file')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit button -->
            <div>
                <button type="submit" 
                        class="w-full bg-blue-500 text-white font-semibold px-4 py-2 rounded-md hover:bg-blue-600 transition">
                    importer Fichier csv
                </button>
            </div>
        </form>
    </div>

</div>

@endsection
