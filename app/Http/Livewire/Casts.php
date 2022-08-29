<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Casts extends Component
{
   
    public $casts;
    public function render()
    {
        return view('livewire.casts');
    }
    
    public function mount($casts) {
        $casts = Http::withToken(config('services.tmdb.token'))
        ->get('http://api.themoviedb.org/3/person/'.$this->casts.'/combined_credits')
        ->json();

        
        // dd(collect($casts)->get('cast'));
        // $title = collect($credits)->get('cast');
        // $credit = collect($title)->where('media_type', 'movie')
        // ->sortByDesc('popularity')->paginate(5);
        $result = collect($casts)->get('cast');
        $collected = collect($result)->sortByDesc('popularity');
        $this->casts = $collected->take(10);
    }
}
