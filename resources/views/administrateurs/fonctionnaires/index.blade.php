@extends("layouts/base")

@section("content")

<div class="bg-blue-50 min-h-screen py-10 px-4">

    <div class="text-center mb-10">
        <!-- Logo -->
        <img src="{{ asset('logos/logo.png') }}" alt="Logo" class="mx-auto w-32 h-32 mb-8">
        <div class="flex justify-between ">
            <h1 class="text-2xl font-bold text-blue-700">Liste des focntionnaires</h1>
            <a class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded" href="{{ route('administrateurs.fonctionnaires.create') }}">Créer une nouvelle fonctionnaire</a>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="py-3 px-6 text-left">#</th>
                    <th class="py-3 px-6 text-left">Nom</th>
                    <th class="py-3 px-6 text-left">Prenom</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($fonctionnaires as $fonctionnaire)
                <tr class="hover:bg-blue-50">
                    <td class="py-3 px-6">{{ $loop->iteration }}</td>
                    <td class="py-3 px-6">{{ $fonctionnaire->nom }}</td>
                    <td class="py-3 px-6">{{ $fonctionnaire->prenom }}</td>
                    <td class="py-3 px-6">{{ $fonctionnaire->email }}</td>
                    <td class="py-3 px-6 space-x-2">
                        <a href="{{ route('administrateurs.fonctionnaires.edit', $fonctionnaire->id) }}" class="bg-yellow-400 px-3 py-1 rounded text-white hover:bg-yellow-500">Modifier</a>
                        <form  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette filière ?');" action="{{ route('administrateurs.fonctionnaires.delete', $fonctionnaire->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 px-3 py-1 rounded text-white hover:bg-red-600">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if($fonctionnaires->isEmpty())
                <tr>
                    <td colspan="4" class="text-center py-4 text-gray-500">Aucune filière trouvée.</td>
                </tr>
                @endif
            </tbody>
        </table>
        <div class="mt-4">
    {{ $fonctionnaires->links() }}
</div>
    </div>

</div>

@endsection
