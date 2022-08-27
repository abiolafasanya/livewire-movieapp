<x-movie>

    <div class="border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            {{-- <img src="{{ asset('img/flash2.jpg')}}" alt="Info Image" class="w-96"> --}}
            <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" alt="Info Image" class="w-96">

            <div class="md:ml-24 text-gray-100">

                <div class="text-4xl font-semibold">{{ $movie['title'] }}</div>

                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        viewBox="0 0 30 29">
                        <g fill="none" fill-opacity=".07" fill-rule="evenodd" stroke="none" stroke-width="1">
                            <g fill="#FFBC57" stroke="#FDAE38" stroke-width="2"
                                transform="translate(-361.000000, -271.000000)">
                                <g transform="translate(362.000000, 13.000000)">
                                    <g transform="translate(0.000000, 259.000000)">
                                        <g>
                                            <path
                                                d="M13.3917,0.37657 L13.3933,0.37336 L9.4317,8.40181 L8.94592,8.47237 L0.58157,9.6872 C0.32598,9.7245 0.11362,9.9034 0.03354,10.149 C-0.046535,10.3946 0.01951,10.6643 0.20236,10.8435 L6.60848,17.0916 L6.52523,17.5754 L5.09111,25.9113 C5.047,26.1664 5.15163,26.4244 5.36093,26.5767 C5.57024,26.729 5.84789,26.7492 6.07294,26.6309 L13.9999993,22.4144 L14.4384,22.6476 L21.923,26.6287 C22.1521,26.7492 22.4298,26.729 22.6391,26.5767 C22.8484,26.4244 22.953,26.1664 22.9088,25.9106 L21.3916,17.0916 L21.743,16.7488 L27.7961,10.8451 C27.9805,10.6643 28.0466,10.3946 27.9665,10.149 C27.8864,9.9034 27.6741,9.7245 27.4191,9.6873 L18.5683,8.40181 L18.3511,7.96159 L14.6084,0.37657 C14.4934,0.14583 14.2578,0 13.9999993,0 C13.7422,0 13.5066,0.14583 13.3917,0.37657 Z" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <span class="">{{ $movie['vote_average'] * 10 }}%</span>
                    <span class="mx-2">|</span>
                    <span class="">
                        {{ isset($movie['release_date']) ? \Carbon\Carbon::parse($movie['release_date'])->format('M d,Y') : 'No date' }}
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
                        {{ $movie['overview'] }}
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
                                    {{$cast['known_for_department']}} |
                                    Popularity: {{$cast['popularity'] * 10}}K

                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="border-b border-gray-800 py-6"></div>
</x-movie>
