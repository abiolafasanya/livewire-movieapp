<div>
    <h1 class="px-3 text-lg text-yellow-500">Popular Movies</h1>

    
    
    <div class="grid grid-col-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($this->movies() as $movie)
        
        <div class="mt-8 p-3">
            <a href="{{ route('movie/info') }}">
                <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" alt="image 1" 
                class="hover:opacity-75 transition ease-in-out bg-blend-normal rounded">
            </a>
            <div class="mt-2">
                <a href="#" class="hover:text-gray-300">
                    {{ $movie['title'] }}
                </a>
                <div class="flex items-center my-2 text-gray-300 text-sm">
                    <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 29"><g fill="none" fill-opacity=".07" fill-rule="evenodd" stroke="none" stroke-width="1"><g fill="#FFBC57" stroke="#FDAE38" stroke-width="2" transform="translate(-361.000000, -271.000000)"><g transform="translate(362.000000, 13.000000)"><g transform="translate(0.000000, 259.000000)"><g><path d="M13.3917,0.37657 L13.3933,0.37336 L9.4317,8.40181 L8.94592,8.47237 L0.58157,9.6872 C0.32598,9.7245 0.11362,9.9034 0.03354,10.149 C-0.046535,10.3946 0.01951,10.6643 0.20236,10.8435 L6.60848,17.0916 L6.52523,17.5754 L5.09111,25.9113 C5.047,26.1664 5.15163,26.4244 5.36093,26.5767 C5.57024,26.729 5.84789,26.7492 6.07294,26.6309 L13.9999993,22.4144 L14.4384,22.6476 L21.923,26.6287 C22.1521,26.7492 22.4298,26.729 22.6391,26.5767 C22.8484,26.4244 22.953,26.1664 22.9088,25.9106 L21.3916,17.0916 L21.743,16.7488 L27.7961,10.8451 C27.9805,10.6643 28.0466,10.3946 27.9665,10.149 C27.8864,9.9034 27.6741,9.7245 27.4191,9.6873 L18.5683,8.40181 L18.3511,7.96159 L14.6084,0.37657 C14.4934,0.14583 14.2578,0 13.9999993,0 C13.7422,0 13.5066,0.14583 13.3917,0.37657 Z"/></g></g></g></g></g></svg>
                    <span class="">{{ $movie['vote_average'] * 10 }}%</span>
                    {{-- <span class="mx-2">|</span> --}}
                     <span class="">{{ $this->formatDate($movie['id']/$movie['release_date']) }}</span>
                </div>
                <span class="flex items-center text-gray-400 text-sm"> 

                    @foreach ($movie['genre_ids'] as $genre)
                    {{
                        $this->genre()->get($genre)
                        
                    }}@if (!$loop->last), @endif
                        
                    @endforeach
                </span>
            </div>
        </div>
        @endforeach
        
    
    </div>
    
</div>
