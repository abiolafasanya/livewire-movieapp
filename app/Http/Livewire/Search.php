<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;


class Search extends Component
{
    public $search = ''; 

    
    public function render()
    {
        $result = [];
        if(strlen($this->search) > 2){
            $result = Http::withToken(config('services.tmdb.token'))
        ->get('http://api.themoviedb.org/3/search/movie?query='.$this->search)
        ->json()['results'];
        // dd($result);
        }


        return view('livewire.search', [
            'results' => collect($result)->take(7)
        ]);
    }

}
