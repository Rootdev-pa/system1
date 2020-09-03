

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <header>
            <div class="container mx-auto px-6 py-3">
                <nav class="flex items-center justify-between flex-wrap bg-white p-6">
                    <div class="flex items-center flex-shrink-0 text-white mr-6">
                      <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"/></svg>
                     <a  href="{{ url('/homes') }}"><span class="font-bold text-4xl text-blue-500">Mi Pedido</span></a>
                </div>
                <div class="block lg:hidden">
                <button
                    class="flex items-center px-3 py-2 border rounded text-teal-200 border-blue-600 hover:text-white hover:border-white">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
                </div>
                <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                <div class="text-sm lg:flex-grow">
                
                </div>
                <div>
                {{-- login register logout  --}}
                    <!-- Authentication Links -->
                    @guest
                        <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white
                         py-2 px-4 border border-blue-500 hover:border-transparent rounded" 
                         href="{{ route('login') }}">Iniciar sesión</a>
                        @if (Route::has('register'))
                        <a class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-black mr-4"
                         href="{{ route('register') }}">Crear cuenta</a>
                        @endif
                    @else
                    {{-- dropdown --}}
                        <div  class="dropdown inline-block relative">
                            <button class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center">
                                <span>{{ Auth::user()->name }}🠋</span>
                            </button>
                            <ul class="dropdown-content absolute hidden text-gray-700 pt-1">
                
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <li><a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"  href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    cerrar sesión
                                </a></li>
                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            @endguest

                        </ul>
                </div>
                </div>
                </nav>
            </div>
        </header>

            {{-- <div class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
            <div class="hidden w-full text-gray-600 md:flex md:items-center">
            </div>
            <div class="w-full text-gray-700 md:text-center text-2xl font-semibold">

                <a class="text-black-800 text-bold " href="/example">Restaurante Bijao</a>
            </div>
            <div class="flex items-center justify-end w-full">
                <div>
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M16.2721 10.2721C16.2721 12.4813 14.4813 14.2721 12.2721 14.2721C10.063 14.2721 8.27214 12.4813 8.27214 10.2721C8.27214 8.06298 10.063 6.27212 12.2721 6.27212C14.4813 6.27212 16.2721 8.06298 16.2721 10.2721ZM14.2721 10.2721C14.2721 11.3767 13.3767 12.2721 12.2721 12.2721C11.1676 12.2721 10.2721 11.3767 10.2721 10.2721C10.2721 9.16755 11.1676 8.27212 12.2721 8.27212C13.3767 8.27212 14.2721 9.16755 14.2721 10.2721Z"
                            fill="currentColor" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.79417 16.5183C2.19424 13.0909 2.05438 7.39409 5.48178 3.79417C8.90918 0.194243 14.6059 0.054383 18.2059 3.48178C21.8058 6.90918 21.9457 12.6059 18.5183 16.2059L12.3124 22.7241L5.79417 16.5183ZM17.0698 14.8268L12.243 19.8965L7.17324 15.0698C4.3733 12.404 4.26452 7.97318 6.93028 5.17324C9.59603 2.3733 14.0268 2.26452 16.8268 4.93028C19.6267 7.59603 19.7355 12.0268 17.0698 14.8268Z"
                            fill="currentColor" />
                    </svg>
                    <span class="mx-1 text-sm">Chiriquí, Panamá</span>

                </div>

                <div class="flex sm:hidden">
                    <button @click="isOpen = !isOpen" type="button"
                        class="text-gray-600 hover:text-gray-500 focus:outline-none focus:text-gray-500"
                        aria-label="toggle menu">
                        <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                            <path fill-rule="evenodd"
                                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <nav :class="isOpen ? '' : 'hidden'" class="sm:flex sm:justify-center sm:items-center mt-4">
            <div class="flex flex-col sm:flex-row">
                <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="/Home">Home</a>
                <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="/example">Categorias</a>
                <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="/example">Contactenos</a>
                <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="/example">Nosotros</a>
            </div>
        </nav>
        <div class="relative mt-6 max-w-lg mx-auto">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>

            <input
                class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline"
                type="text" placeholder="Search">
        </div>
    </div> --}}
    <main class="py-4">
        @yield('content')
    </main>
    </div>
</body>

</html>
<style>
    .dropdown:hover > .dropdown-content {
        display: block;
    }
    </style>
    