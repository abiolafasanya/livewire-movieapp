<x-layout>
    <div class="border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" alt="Info Image" class="w-96">

            <div class="md:ml-24 text-gray-100">

                <div class="text-4xl font-semibold">
                    {{ $movie['last_episode_to_air']['name'] }}
                    <span>| Episode: ({{ $movie['last_episode_to_air']['episode_number'] }})</span>
                </div>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <lsvg />
                    <span class="">{{ $movie['last_episode_to_air']['vote_average'] * 10 }}%</span>
                    <span class="mx-2">|</span>
                    <span class="">
                        {{ isset($movie['last_episode_to_air']['air_date']) ? \Carbon\Carbon::parse($movie['last_episode_to_air']['air_date'])->format('M d,Y') : 'No date' }}
                    </span>
                    <span class="mx-2">|</span>
                    <span class="flex items-center text-gray-400 text-sm">

                        @foreach ($movie['genres'] as $genre)
                            {{ $genre['name'] }}@if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </span>
                </div>

                <div class="mt-8 text-gray-300 px-2 text-sm">
                    <div class="h1 text-gray-100 my-1 text-2xl font-semibold">Overview</div>
                    <div class="text-lg">
                        {{ $movie['overview'] }} <br>
                        {{ $movie['last_episode_to_air']['overview'] }}
                    </div>
                </div>
                <a href="{{ $movie['homepage'] }}" target="blank">

                    <button
                        class="flex items-center bg-yellow-400 ml-2 text-yellow-900 mt-4  py-4 px-5 rounded hover:bg-yellow-500
                    transition ease-in-out duration-150 font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-2.5-3.5l7-4.5-7-4.5v9z" />
                        </svg>
                        <span class="ml-2">PlayTrailer</span>
                    </button>
                </a>
            </div>

        </div>
    </div>

    <div class="cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 text-gray-100">
            <h2 class="font-semibold text-4xl">Cast</h2>
            <div class="grid grid-col-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($casts as $cast)
                    @if (!$cast['profile_path'] == null)
                        <div class="mt-8 p-3">
                            <a href="#" wire:click="">
                                {{-- <img src="{{ asset('img/barry.jpg') }}" alt="image 1" --}}
                                <img src="https://image.tmdb.org/t/p/w500/{{ $cast['profile_path'] }}" alt="image 1"
                                    class="hover:opacity-75 transition ease-in-out bg-blend-normal rounded">
                            </a>
                            <div class="mt-2">
                                <a href="#" class="hover:text-gray-300">
                                    {{ $cast['character'] }} (
                                    {{ $cast['name'] }})
                                </a>
                                <div class="flex items-center text-gray-300 text-sm">
                                    <span class="">
                                        {{ $cast['known_for_department'] }} |
                                        Popularity: {{ $cast['popularity'] * 10 }}K

                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
