<x-movie>
    <div class="py-8 px-10 container mx-auto">
        <h1 class="px-3 text-lg text-yellow-500">Popular Actors</h1>

        <div class="grid grid-col-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($actors as $actor)
                <div class="mt-8 p-3">
                    <a href="{{ url('actor/' . $actor['id']) }}">
                        @if ($actor['profile_path'])
                            <img src="https://image.tmdb.org/t/p/w235_and_h235_face/{{ $actor['profile_path'] }}"
                                alt="image 1" class="hover:opacity-75 transition ease-in-out bg-blend-normal rounded">
                        @else
                            <img src="https://ui-avatars.com/api/?size=235&name={{$actor['name']}}" alt="image 1"
                                class="hover:opacity-75 transition ease-in-out bg-blend-normal rounded">
                        @endif
                    </a>
                    <div class="mt-2">
                        <a href="#" class="hover:text-gray-300">
                            {{ $actor['name'] }}
                        </a>
                        <x-know-for :actor="$actor" />

                    </div>
                </div>
            @endforeach
        </div>
        <div class="bg-white p-2">
            {!! $actors->links() !!}
        </div>
    </div>
</x-movie>
