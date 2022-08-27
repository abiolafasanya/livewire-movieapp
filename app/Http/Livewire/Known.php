<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Known extends Component
{
    public $actors;
    public function render()
    {
        $known_as =   collect($this->actors['known_for'])
        ->where('media_type', 'movie')
        ->pluck('title')
        ->union(collect($this->actors['known_for'])
        ->where('media_type', 'tv')
        ->pluck('title'))->implode(', ');
        return view('livewire.known', ['known' => $known_as]);
    }

}
