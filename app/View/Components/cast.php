<?php

namespace App\View\Components;

use Illuminate\View\Component;

class cast extends Component
{
    public $casts;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($casts)
    {
        $title = collect($casts)->get('cast');
        $casts = collect($title)->where('media_type', 'movie')
        ->sortByDesc('popularity')->paginate(5);
        $this->casts = $casts;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cast');
    }
}
