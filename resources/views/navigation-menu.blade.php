<nav x-data="{ open: false }" class="bg-white sticky -top-1 z-50 shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-14">
            <!-- logo -->
            <div class="shrink-0 flex items-center">
                <a href="/">
                    <x-jet-application-mark class="block h-9 w-auto" />
                </a>
            </div>
            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 lg:flex scree">
                <x-jet-nav-link class="font-semibold text-xs text-neutral-900" href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('INICIO') }}
                </x-jet-nav-link>

                <x-jet-nav-link class="font-semibold text-xs text-neutral-900" href="{{ route('process.index') }}" :active="request()->routeIs('process.*')">
                    {{ __('PROCESOS') }}
                </x-jet-nav-link>

                <x-jet-nav-link class="font-semibold text-xs text-neutral-900" href="{{ route('notice.index') }}" :active="request()->routeIs('notice.*')">
                    {{ __('NOTICIAS') }}
                </x-jet-nav-link>

                <x-jet-nav-link class="font-semibold text-xs text-neutral-900" href="{{ route('project.index') }}" :active="request()->routeIs('project.*')">
                    {{ __('PROYECTOS') }}
                </x-jet-nav-link>

                <x-jet-nav-link class="font-semibold text-xs text-neutral-900" href="{{ route('surrender.index') }}" :active="request()->routeIs('surrender.index')">
                    {{ __('RENDICIÓN') }}
                </x-jet-nav-link>

                <x-jet-nav-link class="font-semibold text-xs text-neutral-900" href="{{ route('transparency.index') }}" :active="request()->routeIs('transparency.index')">
                    {{ __('TRANSPARENCIA') }}
                </x-jet-nav-link>
                
                <x-jet-nav-link class="font-semibold text-xs text-neutral-900" href="{{ route('about') }}" :active="request()->routeIs('about')">
                    {{ __('NOSOTROS') }}
                </x-jet-nav-link>

                <x-jet-nav-link class="flex justify-center items-center text-xs bg-neutral-900 hover:bg-red-700 transition-all cursor-pointer rounded-full h-8 my-auto" href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                    <span class="px-3 text-white hover:text-white">
                        {{ __('CONTACTANOS') }}
                    </span>
                </x-jet-nav-link>
            </div>
            <div class="hidden lg:flex sm:items-center sm:ml-6">
                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    @auth
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                        </button>
                                    @else
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                {{ Auth::user()->name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    @endif
                                
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-jet-dropdown-link>

                                @can('Ver Moderador')
                                    <x-jet-dropdown-link href="{{ route('moderador.dashboard.index') }}">
                                        {{ __('Moderador') }}
                                    </x-jet-dropdown-link>
                                @endcan
                                @can('Ver Admin')
                                    <x-jet-dropdown-link href="{{ route('admin.home') }}">
                                        {{ __('Administrador') }}
                                    </x-jet-dropdown-link>
                                @endcan
                                
                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet-dropdown-link>
                                @endif

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                            @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    @else
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                    <button title="sesion" name="sesion" type="button" class="flex text-sm px-3 py-2  bg-neutral-900 rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                        <i class="fa-solid fa-user text-white"></i>
                                        <svg class="ml-2 -mr-0.5 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    Configuraciones
                                </div>
                                <x-jet-dropdown-link href="{{ route('login') }}">
                                    Login
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{ route('register') }}">
                                    Register
                                </x-jet-dropdown-link>
                            </x-slot>
                        </x-jet-dropdown>
                    @endauth
                    
                </div>
            </div>
            <!-- Hamburger -->
            <div class="-mr-2 flex items-center lg:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link class="text-xs" href="{{ route('home') }}" :active="request()->routeIs('home')">
                {{ __('INICIO') }}
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link class="text-xs" href="{{ route('process.index') }}" :active="request()->routeIs('process.*')">
                {{ __('PROCESOS') }}
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link class="text-xs" href="{{ route('notice.index') }}" :active="request()->routeIs('notice.*')">
                {{ __('NOTICIAS') }}
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link class="text-xs" href="{{ route('project.index') }}" :active="request()->routeIs('project.*')">
                {{ __('PROYECTOS') }}
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link class="text-xs" href="{{ route('surrender.index') }}" :active="request()->routeIs('surrender.index')">
                {{ __('RENDICIÓN') }}
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link class="text-xs" href="{{ route('transparency.index') }}" :active="request()->routeIs('transparency.index')">
                {{ __('TRANSPARENCIA') }}
            </x-jet-responsive-nav-link>
            
            <x-jet-responsive-nav-link class="text-xs" href="{{ route('about') }}" :active="request()->routeIs('about')">
                {{ __('NOSOTROS') }}
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link class="text-xs" href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                {{ __('CONTACTANOS') }}
            </x-jet-responsive-nav-link>
            @guest
                <x-jet-responsive-nav-link class="uppercase" href="{{ route('login') }}" :active="request()->routeIs('login')">                    
                    {{ __('Login') }}
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link class="uppercase" href="{{ route('register') }}" :active="request()->routeIs('register')">                    
                    {{ __('Register') }}
                </x-jet-responsive-nav-link>
            @endguest
        </div>
        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-1 border-t border-gray-200">
                
                <div class="flex items-center px-4">
                    
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 mr-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                
                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-jet-responsive-nav-link class="uppercase" href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-jet-responsive-nav-link>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <x-jet-responsive-nav-link class="uppercase" href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-jet-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</nav>
