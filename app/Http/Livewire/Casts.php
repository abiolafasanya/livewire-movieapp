<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Casts extends Component
{
   
    public $credits;
    public function render()
    {
        
        return view('livewire.casts');
    }

    public function mount($credits) {
        $this->credits = $credits;
        
        // dd(collect($credits)->get('cast'));
        $title = collect($credits)->get('cast');
        $credit = collect($title)->where('media_type', 'movie')
        ->sortByDesc('popularity')->paginate(5);
        // $this->credits = $credit;
        // dump($credit);

    }
}
