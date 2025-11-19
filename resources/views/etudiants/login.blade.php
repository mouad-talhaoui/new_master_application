@extends("layouts/base")

@section("content")

<div class="bg-blue-50 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">

        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('logos/logo.png') }}" alt="Logo" class="h-16 w-auto">
        </div>

        <!-- Heading -->
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Authentification d'étudiant</h2>

        <!-- Display session error (e.g., login failed) -->
        @if(session('error'))
            <div class="mb-4 text-red-600 text-sm text-center">
                {{ session('error') }}
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('etudiants.loginPost') }}">
            @csrf

            <!-- CIN -->
            <div class="mb-4">
                <label for="cin" class="block text-sm font-medium text-gray-700">CIN</label>
                <input type="text" name="cin" id="cin" value="{{ old('cin') }}" required
                placeholder="cin"
                       class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500 border-gray-300 @error('cin') border-red-500 @enderror">
                @error('cin')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- CNE -->
            <div class="mb-4">
                <label for="cne" class="block text-sm font-medium text-gray-700">CNE</label>
                <input type="text" name="cne" id="cne" value="{{ old('cne') }}" required
                        placeholder="cne"
                       class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500 border-gray-300 @error('cne') border-red-500 @enderror">
                @error('cne')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit -->
            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                Se connecter
            </button>
        </form>

    </div>

</div>

@endsection
