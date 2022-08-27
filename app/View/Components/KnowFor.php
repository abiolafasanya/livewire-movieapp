<?php

namespace App\View\Components;

use Illuminate\View\Component;

class KnowFor extends Component
{

    public $actor;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($actor)
    {
        $this->actor = collect($actor['known_for'])
        ->where('media_type', 'movie')
        ->pluck('title')
        ->union(collect($actor['known_for'])
        ->where('media_type', 'tv')
        ->pluck('title'))->implode(', '); 

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.know-for');
    }
}
