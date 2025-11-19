@extends("layouts/base")

@section("content")

<div class="bg-blue-50 min-h-screen py-10 px-4">

    <div class="text-center mb-10">
        <!-- Logo -->
        <img src="{{ asset('logos/logo.png') }}" alt="Logo" class="mx-auto w-32 h-32 mb-8">
        <div class="flex justify-between ">
            <h1 class="text-2xl font-bold text-blue-700">Liste des Rendez vous</h1>
            <a class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded" href="{{ route('administrateurs.rendezvous.create') }}">Créer une nouvelle Rendez Vous</a>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="py-3 px-6 text-left">#</th>
                    <th class="py-3 px-6 text-left">date</th>
                    <th class="py-3 px-6 text-left">nombre_d_etudiant</th>
                    <th class="py-3 px-6 text-left">nombre_d_etudiant_actual</th>
                    <th class="py-3 px-6 text-left">filiere</th>
                    <th class="py-3 px-6 text-left">Verouille?</th>
                    <th class="py-3 px-6 text-left">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($rdvs as $rdv)
                <tr class="hover:bg-blue-50">
                    <td class="py-3 px-6">{{ $loop->iteration }}</td>
                    <td class="py-3 px-6">{{ $rdv->date }}</td>
                    <td class="py-3 px-6">{{ $rdv->nombre_d_etudiant }}</td>
                                        <td class="py-3 px-6">{{ $rdv->nombre_d_etudiant_actual }}</td>
                                                            <td class="py-3 px-6">{{ App\Models\Filiere::find($rdv->filiere_id)->nom_complet }}</td>

                                                            <td class="py-3 px-6">{{ $rdv->isEnabled ? 'Oui' : 'Non'}}</td>

                    <td class="py-3 px-6 space-x-2">
                        <a href="{{ route('administrateurs.rendezvous.edit', $rdv->id) }}" class="bg-yellow-400 px-3 py-1 rounded text-white hover:bg-yellow-500">Modifier</a>
                        <form  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette rdv ?');" action="{{ route('administrateurs.rendezvous.delete', $rdv->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 px-3 py-1 rounded text-white hover:bg-red-600">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if($rdvs->isEmpty())
                <tr>
                    <td colspan="4" class="text-center py-4 text-gray-500">Aucune rendez vous trouvée.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

</div>

@endsection
