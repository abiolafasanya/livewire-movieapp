<div>
    <span class="grid md:grid-cols-5 grid-cols-1 gap-4 items-center text-gray-400 text-sm">
        @foreach ($casts as $cast)
            <div class="flex flex-col text-sm">
                <a href="{{ route('movie', $cast['id']) }}">
                    @isset($cast['poster_path'])
                        <img src="https://image.tmdb.org/t/p/w185/{{ $cast['poster_path'] }}" alt=""
                            title="{{ $cast['overview'] }}">
                    @else
                        <img src="https://via.placeholder.com/185x278/cccccc/969696" alt=""
                            title="{{ $cast['overview'] }}"">
                    @endisset
                </a>
                {{-- <img src="https://image.tmdb.org/t/p/w300/{{ $cast['poster_path'] }}" alt=""> --}}
                <h1 class="text-base
                        font-semibold">
                    @isset($cast['title'])
                        {{ $cast['title'] }}
                    @endisset
                </h1>
            </div>
        @endforeach
    </span>
    <div class="bg-gray-200 p-2">
        {{ $casts->links() }}
    </div>
</div>
