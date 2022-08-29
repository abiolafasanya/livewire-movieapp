<?php

namespace App\View\Components;

use Illuminate\View\Component;

class socials extends Component
{
    public $social, $actor;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($social, $actor)
    {
        $social = collect($social)->merge([
            'facebook' => $social['facebook_id'] ? 'https://facebook.com/'.$social['facebook_id'] : null,
            'twitter' => $social['twitter_id'] ? 'https://twitter.com/'.$social['twitter_id'] : null,
            'instagram' => $social['instagram_id'] ? 'https://instagram.com/'.$social['instagram_id'] : null,
        ])->only([
            'facebook', 'twitter', 'instagram'
        ]);
        $this->social = $social;
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
