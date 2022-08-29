<div class="flex space-x-4 items-center mt-2">
    @if ($social['facebook'])
        {{-- <a href="{{$social['facebook']}}"><i class="fab fa-facebook-square text-xl" aria-hidden="true"></i></a> --}}
        <a href="{{ $social['facebook'] }}"><i class="fab fa-facebook-square text-xl" aria-hidden="true"></i></a>
    @endif
    @if ($social['twitter'])
        <a href="{{ $social['twitter'] }}"><i class="fab fa-twitter text-xxl" aria-hidden="true"></i></a>
    @endif
    @if ($social['instagram'])
        <a href="{{ $social['instagram'] }}"><i class="fab fa-instagram text-xl" aria-hidden="true"></i></a>
    @endif
    @if ($actor['homepage'])
        <a href="{{ $actor['homepage'] }}"><i class="fas fa-globe text-xl" aria-hidden="true"></i></a>
    @endif
</div>
