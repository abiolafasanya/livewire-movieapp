<div class="flex space-x-4 items-center mt-2">
    @if ($socials['facebook_id'])
        {{-- <a href="{{$socials['facebook_id']}}"><i class="fab fa-facebook-square text-xl" aria-hidden="true"></i></a> --}}
        <a href="{{$socials['facebook_id']}}"><i class="fab fa-facebook-square text-xl" aria-hidden="true"></i></a>
    @endif
    @if ($socials['twitter_id'])
        <a href="{{$socials['twitter_id']}}"><i class="fab fa-twitter text-xxl" aria-hidden="true"></i></a>
    @endif
    @if ($socials['instagram_id'])
    <a href="{{$socials['instagram_id']}}"><i class="fab fa-instagram text-xl" aria-hidden="true"></i></a>
    @endif
    @if ($actor['homepage'])
    <a href="{{$actor['homepage']}}"><i class="fas fa-globe text-xl" aria-hidden="true"></i></a>
    @endif
</div>