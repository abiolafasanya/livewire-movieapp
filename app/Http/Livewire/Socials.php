<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Socials extends Component
{
    public $social, $actor;
    public function render()
    {
        return view('livewire.socials');
    }

    public function mount($social, $actor){
       
        $socials = collect($social)->merge([
            'facebook' => $social['facebook_id'] ? 'https://facebook.com/'.$social['facebook_id'] : null,
            'twitter' => $social['twitter_id'] ? 'https://twitter.com/'.$social['twitter_id'] : null,
            'instagram' => $social['instagram_id'] ? 'https://instagram.com/'.$social['instagram_id'] : null,
        ])->only([
            'facebook', 'twitter', 'instagram'
        ]);

        $this->social = $socials;
        $this->actor = $actor;
    }
}
