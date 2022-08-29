<x-layout>

    <div class="border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            {{-- <img src="{{ asset('img/flash2.jpg')}}" alt="Info Image" class="w-96"> --}}
            <div class="md:w-1/4">
                <img src="https://image.tmdb.org/t/p/w500/{{ $actor['profile_path'] }}" alt="Info Image" class="">
                {{-- <x-socials :social="$socials" :actor="$actor" /> --}}
                <x-socials :social="$socials" :actor="$actor" />
                {{-- @dump($socials) --}}
            </div>

            <div class="md:w-3/4 md:ml-24 text-gray-100">

                <div class="text-4xl font-semibold">{{ $actor['name'] }}</div>

                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <x-lsvg />
                    <span class="">{{ $actor['popularity'] }}K</span>
                    <span class="mx-2"> </span>
                    <span>
                        {{ \Carbon\Carbon::parse($actor['birthday'])->format('M d,Y') }}
                        ({{ \Carbon\Carbon::parse($actor['birthday'])->age }} years old)
                    </span>
                    <span class="mx-2"> </span>
                    <span class="">
                        {{ $actor['place_of_birth'] }}
                    </span>
                    <span class="mx-2"></span>
                </div>

                <div class="mt-8 text-gray-300 px-2">
                    <div class="h1 text-gray-100 my-1 text-2xl font-semibold">Biography</div>
                    <div class="text-base">
                        {{ $actor['biography'] }}
                    </div>
                </div>
                <div class="mt-8 text-gray-300 px-2">
                    <div class="h1 text-gray-100 my-1 text-2xl font-semibold">Casts</div>
                    {{-- <x-casts :casts="$credits" /> --}}
                    <x-casts :credits="$credits" />
                </div>
            </div>

        </div>
    </div>
</x-layout>
