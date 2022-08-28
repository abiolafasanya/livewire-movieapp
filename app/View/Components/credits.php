<?php

namespace App\View\Components;

use Illuminate\View\Component;

class credits extends Component
{
    public $credits;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($credits)
    {
        $title = collect($credits)->get('cast');
        $credits = collect($title)->where('media_type', 'movie')
        ->sortByDesc('popularity');
        $this->credits = $credits;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.credits');
    }
}
