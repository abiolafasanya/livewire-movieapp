<?php

namespace App\View\Components;

use Illuminate\View\Component;

class socials extends Component
{
    public $socials, $actor;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($socials, $actor)
    {
        $socials = collect($socials)->merge([
            'facebook' => $socials['facebook_id'] ? 'https://facebook.com/'.$socials['facebook_id'] : null,
            'twitter' => $socials['twitter_id'] ? 'https://twitter.com/'.$socials['twitter_id'] : null,
            'instagram' => $socials['instagram_id'] ? 'https://instagram.com/'.$socials['instagram_id'] : null,
        ])->only([
            'facebook', 'twitter', 'instagram'
        ]);
        $this->socials = $socials;
        $this->actor = $actor;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.socials');
    }
}
