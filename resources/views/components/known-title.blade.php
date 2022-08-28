<div>
    <span class="flex items-center text-gray-400 text-sm">
        @foreach ($actor['also_known_as'] as $known)
            {{ $known }}
        @endforeach
    </span>
</div>
