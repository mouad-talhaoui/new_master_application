@extends("layouts/base")

@section("content")

<div class="bg-blue-50 flex items-center justify-center min-h-screen py-10">

    <div class="bg-white p-10 rounded-xl shadow-xl w-full max-w-lg">
        
        @if (Auth::guard("web")->user()->isConfirmed)
            
            <div class="text-center">
                <h2 class="text-2xl font-semibold text-green-600 mb-3">Inscription Confirmée</h2>
                <p class="text-gray-700">Votre inscription est déjà confirmée.</p>
            </div>

        @else

            @if(Auth::guard("web")->user()->id_rdv)

                <div class="text-center">
                    <h2 class="text-xl font-semibold text-yellow-600 mb-3">Rendez-vous déjà pris</h2>
                    <p class="text-gray-700">Vous devez déposer votre dossier pour confirmer votre inscription.</p>
                </div>

            @else

                <div>
                    <h2 class="text-2xl font-semibold text-blue-600 mb-5 text-center">Prendre un Rendez-vous pour de poser votre dossier</h2>

                    <form action="{{ route('etudiants.rdv') }}" method="POST" class="space-y-5">
                        @csrf

                        <div>
                            <label for="datepicker" class="block text-gray-700 font-medium mb-1">
                                Date du RDV
                            </label>

                            <input type="text" 
                                   id="datepicker"
                                   name="date"
                                   placeholder="Sélectionner une date"
                                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
                                   required>

                            @error('date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                                class="w-full py-2.5 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                            Valider le rendez-vous
                        </button>
                    </form>

                </div>

            @endif

        @endif

    </div>

</div>

<script>
    var picker = new Pikaday({ 
        field: document.getElementById('datepicker'),
        format: 'YYYY-MM-DD',

        disableDayFn: function(date) {
            var day = date.getDay();
            if (day === 0 || day === 6) return true;

            var today = new Date();
            today.setHours(0,0,0,0);

            if (date < today) return true;

            return false;
        }
    });
</script>

@endsection
