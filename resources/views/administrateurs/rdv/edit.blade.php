@extends("layouts.base")

@section("content")

<div class="bg-blue-50 min-h-screen py-10 px-4">

    <div class="text-center mb-10">
        <!-- Logo -->
        <img src="{{ asset('logos/logo.png') }}" alt="Logo" class="mx-auto w-32 h-32 mb-8">
        
        <h1 class="text-2xl font-bold text-blue-700">Créer une nouvelle filière</h1>
    </div>

    <!-- Formulaire de création -->
    <!-- Formulaire de création -->
<div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Créer un RDV</h2>

    <form action="{{ route('administrateurs.rendezvous.store') }}" method="POST" class="space-y-5">
        @csrf
        <!-- Datepicker -->
        <div>
            <label for="datepicker" class="block text-gray-700 font-medium mb-1">Date du RDV</label>
            <input type="text" id="datepicker" name="date"
                   placeholder="Sélectionner une date"
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition" required>
            @error('date')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Nombre des étudiants max -->
        <div>
            <label for="nombre_d_etudiant" class="block text-gray-700 font-medium mb-1">Nombre d'étudiants max</label>
            <input type="number" name="nombre_d_etudiant" id="nombre_d_etudiant" value="{{ old('nombre_d_etudiant') }}"
                   placeholder="nombre d'etudiant"
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition" required>
            @error('nombre_d_etudiant')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>


        <!-- Filière -->
        <div>
            <label for="id_filiere" class="block text-gray-700 font-medium mb-1">Filière</label>
            <select name="id_filiere" id="id_filiere" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition" required>
                <option value="" disabled selected>Choisir une filière</option>
                @php
                    $filieres = App\Models\Filiere::all();
                @endphp
                @foreach($filieres as $filiere)
                    <option value="{{ $filiere->id }}">{{ $filiere->nom_complet }}</option>
                @endforeach
            </select>
            @error('id_filiere')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit button -->
        <div>
            <button type="submit"
                    class="w-full bg-blue-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200 shadow-md">
                Créer le RDV
            </button>
        </div>
    </form>
</div>


</div>



<script>
    var picker = new Pikaday({ 
        field: document.getElementById('datepicker'),
        format: 'YYYY-MM-DD',
        // Disable weekends and past dates
        disableDayFn: function(date) {
            // Disable Saturday (6) and Sunday (0)
            var day = date.getDay();
            if (day === 0 || day === 6) return true;

            // Disable past dates
            var today = new Date();
            today.setHours(0,0,0,0); // remove time part
            if (date < today) return true;

            return false; // date is selectable
        }
    });
</script>

@endsection
