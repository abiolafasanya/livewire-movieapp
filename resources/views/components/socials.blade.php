<div class="flex space-x-4 items-center mt-2">
    @if ($socials['facebook'])
        {{-- <a href="{{$socials['facebook_id']}}"><i class="fab fa-facebook-square text-xl" aria-hidden="true"></i></a> --}}
        <a href="{{$socials['facebook']}}"><i class="fab fa-facebook-square text-xl" aria-hidden="true"></i></a>
    @endif
    @if ($socials['twitter'])
        <a href="{{$socials['twitter']}}"><i class="fab fa-twitter text-xxl" aria-hidden="true"></i></a>
    @endif
    @if ($socials['instagram'])
    <a href="{{$socials['instagram']}}"><i class="fab fa-instagram text-xl" aria-hidden="true"></i></a>
    @endif
    @if ($actor['homepage'])
    <a href="{{$actor['homepage']}}"><i class="fas fa-globe text-xl" aria-hidden="true"></i></a>
    @endif
</div>