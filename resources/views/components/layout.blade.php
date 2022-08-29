<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BeeMovies</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    @vite('resources/js/app.js')
    @livewireStyles
</head>

<body class="antialiased bg-gray-900 text-gray-100">
    <x-navbar />
    <main>
        {{ $slot }}
    </main>
    <footer class="text-center border-t text-gray-300 text-sm border-gray-800 py-6">
        <div class="text-center">
            <div>
                Credit: <a href="https://www.themoviedb.org/">TMDB Movie Listing API</a>
            </div>
            <div>
                Github Repository: <a href="https://github.com/fastbeetech/livewire-movieapp"><i class="fab fa-github" aria-hidden="true"></i></a>
            </div>
        </div>
    </footer>
    @livewireScripts
</body>

</html>
