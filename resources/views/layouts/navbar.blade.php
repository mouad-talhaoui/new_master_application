<nav class="bg-blue-300 shadow-2xl text-white" x-data="{ open: false, userMenu: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Logo -->
            <div class="flex items-center">
                <img class="w-10 h-10" src="{{ asset('logos/logo.png') }}" />
                <a href="{{ route('home') }}" class="text-xl font-bold">Fsjeste</a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6">
                <!-- User dropdown -->
                 @auth
                <div class="relative" x-data="{ dropdownOpen: false }">
                    <button @click="dropdownOpen = !dropdownOpen" class="flex items-center hover:text-blue-200 focus:outline-none">
                        {{ Auth::user()->nom . ' ' . Auth::user()->prenom }}
                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div x-show="dropdownOpen" @click.away="dropdownOpen = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-95"
                         class="absolute right-0 mt-2 w-48 bg-white text-black rounded-md shadow-lg z-20">
                         @if (Auth::guard('web')->check())
                            <form method="POST" action="{{ route('etudiants.logout') }}">
                        @endif
                        @if (Auth::guard('administrateur')->check())
                            <form method="POST" action="{{ route('administrateurs.logout') }}">
                        @endif
                        @if (Auth::guard('fonctionnaire')->check())
                            <form method="POST" action="{{ route('fonctionnaires.logout') }}">
                        @endif
                        
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-200">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
                @endauth
            </div>

            <!-- Mobile Button -->
            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="focus:outline-none">
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>

                    <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition class="md:hidden bg-blue-700">
        <div class="px-4 py-2">
            @auth
            <div x-data="{ dropdownOpen: false }">
                <button @click="dropdownOpen = !dropdownOpen" class="w-full text-left flex justify-between items-center hover:text-blue-200">
                    {{ Auth::user()->nom . ' ' . Auth::user()->prenom }}
                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="dropdownOpen" @click.away="dropdownOpen = false" x-transition class="mt-2">
                    
                    @if (Auth::guard('web')->check())
                            <form method="POST" action="{{ route('etudiants.logout') }}">
                        @endif
                        @if (Auth::guard('administrateur')->check())
                            <form method="POST" action="{{ route('administrateurs.logout') }}">
                        @endif
                        @if (Auth::guard('fonctionnaire')->check())
                            <form method="POST" action="{{ route('fonctionnaires.logout') }}">
                        @endif
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-blue-500">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
            @endauth
        </div>
    </div>
</nav>
