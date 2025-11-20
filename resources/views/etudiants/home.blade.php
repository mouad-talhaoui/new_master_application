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
            @foreach(Auth::guard("web")->user()->filieres as $filiere)
                @if(\DB::table('rdv_user')->select('rdv_id')->where('user_id', Auth::guard("web")->user()->id)->join("rdvs", "rdvs.id", "rdv_user.rdv_id")->where('rdvs.filiere_id', $filiere->id)->exists())
                    <div class="text-center card border-2 border-blue-60 rounded-lg shadow-lg m-3 p-3">
                        <a class="btn " href="{{ route('etudiants.rdv.download', $filiere->id) }}">RDV</a>
                        <h2 class="text-xl font-semibold text-yellow-600 mb-3">Rendez-vous déjà pris</h2>
                        <p class="text-gray-700">Vous devez déposer votre dossier pour confirmer votre inscription.</p>
                    </div>
                @else
                    <div class="text-center card border-2 border-blue-60 rounded-lg shadow-lg m-3 p-3">
                        no prise
                    </div>
                @endif
            @endforeach


        @endif

    </div>

</div>


@endsection
