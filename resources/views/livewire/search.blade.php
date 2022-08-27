<div class="flex flex-col md:flex-row items-center" x-data="{ isOpen: true }" @click.outside="isOpen = false">
    <div class="relative md:mt-0 mt-2">
        <input 
        wire:model.debounce.500ms="search" type="text"
         @focus="isOpen = true"
         @keydown.enter="isOpen = true"
         @keydown.tab="isOpen = false"
            class="bg-gray-800 pl-10 text-sm focus:border-gray-500 focus:outline-none rounded-full w-64 px-4 py-1"
            placeholder="Search">
        <div class="absolute top-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 mt-1 ml-2 text-gray-500" fill="#FFF">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path
                    d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
            </svg>
        </div>
    </div>

    <div class="md:ml-4 md:mt-0 mt-2">
        <a href="#">
            <img src="{{ asset('img/man.png') }}" alt="avatar" class="rounded-full w-8 h-8">
        </a>
    </div>

    @if (strlen($search) > 2)
        <div class="absolute bg-gray-800 rounded w-64 md:mt-12 mt-24 top-4 mt-40 text-sm" 
        x-show.transition.opacity="isOpen"
            @keydown.escape.window="isOpen = false">
            @if ($results->count() > 0)

                @foreach ($results as $result)
                    <ul>
                        <li class="border-b border-gray-700">
                            <a href="{{ route('movie', $result['id']) }}"
                                class="block hover:bg-gray-700 px-3 py-3 flex items-center space-x-4 "
                                @if ($loop->last) @keydown.tab="isOpen = false" @endif>
                                @if ($result['poster_path'])
                                    <img src="https://image.tmdb.org/t/p/w45/{{ $result['poster_path'] }}"
                                        alt="" class="w-8 shrink-0 ">
                                @else
                                    <img src="https://via.placeholder.com/50x75/111827/000000" alt=""
                                        class="w-8 shrink-0 ">
                                @endif
                                {{-- <div style="color: #111827"></div> --}}
                                <span> {{ $result['title'] }}</span>
                            </a>
                        </li>
                    </ul>
                @endforeach
            @else
                <div class="border-b border-gray-700">
                    <span class="block hover:bg-gray-700 px-3 py-3 ">Not result for {{ $search }}</span>
                </div>

            @endif
        </div>
    @endif

</div>
