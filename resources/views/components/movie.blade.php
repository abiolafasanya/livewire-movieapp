<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script> --}}

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="bg-gray-900 text-gray-100">
        <nav class="border-b border-gray-800 md:border-gray-700 sm:relative">

            <div 
                class="container mx-auto flex flex-col md:flex-row justify-between items-center px-8 py-6">
                <div class="flex flex-col md:flex-row items-center">
                    <span class="flex flex-row justify-between items-center mr-2">
                        <svg class="bg-gray-100 mx-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M18 4l2 4h-3l-2-4h-2l2 4h-3l-2-4H8l2 4H7L5 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V4h-4z"/>
                        </svg>
                        <a href="{{ route('movies') }}" class="text-2xl">BeeMovie</a>
                    </span>
                    
                    <span class="flex items-center flex-col md:flex-row" x-show="isOpen">
                        <a href="{{ route('movies') }}" class="text-gray-400 md:ml-2 hover:text-gray-100">Movies</a>
                        <a href="" class="text-gray-400 md:ml-2 hover:text-gray-100">Tv shows</a>
                        <a href="" class="text-gray-400 md:ml-2 hover:text-gray-100">Actors</a>
                    </span>
                    
                </div>

                <div class="flex flex-col md:flex-row items-center">
                   <div class="relative md:mt-0 mt-2">
                        <input type="text" class="bg-gray-800 pl-10 text-sm focus:border-gray-500 focus:outline-none rounded-full w-64 px-4 py-1" placeholder="Search">
                        <div class="absolute top-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 mt-1 ml-2 text-gray-500" fill="#FFF">
                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                            </svg>
                        </div>
                   </div>

                   <div class="md:ml-4 md:mt-0 mt-2">
                       <a href="#">
                           <img src="{{ asset('img/man.png') }}" alt="avatar" class="rounded-full w-8 h-8">
                       </a>
                   </div>
    
                </div>

            </div>
            
        </nav>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
