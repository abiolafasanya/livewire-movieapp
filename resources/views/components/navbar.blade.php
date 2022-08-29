<nav class="border-b border-gray-800 md:border-gray-700 sm:relative">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center px-8 py-6">
        <div class="flex flex-col md:flex-row items-center">
            <span class="flex flex-row justify-between items-center mr-2">
                <svg class="bg-gray-100 mx-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path
                        d="M18 4l2 4h-3l-2-4h-2l2 4h-3l-2-4H8l2 4H7L5 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V4h-4z" />
                </svg>
                <a href="{{ route('movies') }}" class="text-2xl">BeeMovie</a>
            </span>

            <span class="flex items-center flex-col md:flex-row">
                <a href="{{ route('movies') }}" class="text-gray-400 md:ml-2 hover:text-gray-100">Movies</a>
                <a href="{{ route('tv') }}" class="text-gray-400 md:ml-2 hover:text-gray-100">Tv shows</a>
                <a href="{{ route('actors') }}" class="text-gray-400 md:ml-2 hover:text-gray-100">Actors</a>
            </span>

        </div>
        @livewire('search')
    </div>
</nav>
