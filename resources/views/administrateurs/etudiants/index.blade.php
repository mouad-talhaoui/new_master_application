@extends("layouts/base")

@section("content")

<div class="bg-blue-50 min-h-screen py-10 px-4">

    <div class="text-center mb-10">
        <!-- Logo -->
        <img src="{{ asset('logos/logo.png') }}" alt="Logo" class="mx-auto w-32 h-32 mb-8">
        <div class="flex justify-between ">
            <h1 class="text-2xl font-bold text-blue-700">Liste des étudiants</h1>
            <a class="text-white bg-green-500 hover:bg-green-600 px-4 py-2 rounded" href="{{ route('administrateurs.etudiants.import') }}">Importer les étudiants</a>
            <a class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded" href="{{ route('administrateurs.etudiants.export') }}">Exporter les étudiants</a>
        </div>
    </div>
    <div class="m-3 p-4"> 
    <form class="flex items-center space-x-3" method="get" action="{{ route('administrateurs.etudiants.index') }}">
    <!-- Input -->
    <input 
        type="text" 
        placeholder="Search..." 
        name="search"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
    >

    <!-- Button -->
    <button 
        type="submit" 
        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
    >
        Search
    </button>
</form>
</div>
    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="py-3 px-6 text-left">#</th>
                    <th class="py-3 px-6 text-left">Nom</th>
                    
                    <th class="py-3 px-6 text-left">Prenom</th>
                    <th class="py-3 px-6 text-left">CIN</th>
                    <th class="py-3 px-6 text-left">CNE</th>
                    <th class="py-3 px-6 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($etudiants as $et)
                <tr class="hover:bg-blue-50">
                    <td class="py-3 px-6">{{ $loop->iteration }}</td>
                    <td class="py-3 px-6">{{ $et->nom }}</td>
                    <td class="py-3 px-6">{{ $et->prenom }}</td>
                    <td class="py-3 px-6">{{ $et->cin }}</td>
                    <td class="py-3 px-6">{{ $et->cne }}</td>
                    <td class="py-3 px-6 space-x-2">
                        <a href="{{ route('administrateurs.etudiants.edit', $et->id) }}" class="bg-yellow-400 px-3 py-1 rounded text-white hover:bg-yellow-500">Modifier</a>
                        <form  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette filière ?');" action="{{ route('administrateurs.etudiants.delete', $et->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 px-3 py-1 rounded text-white hover:bg-red-600">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if($etudiants->isEmpty())
                <tr>
                    <td colspan="4" class="text-center py-4 text-gray-500">Aucune filière trouvée.</td>
                </tr>
                @endif
            </tbody>
        </table>
        <div class="mt-4">
    {{ $etudiants->links() }}
</div>
    </div>

</div>

@endsection
