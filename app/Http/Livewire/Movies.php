<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Livewire\Component;

class Movies extends Component
{

    public function render()
    {
        return view('livewire.movies');
    }

    public function movies()
    {
     return $movies = Http::withToken(config('services.tmdb.token'))
                ->get('http://api.themoviedb.org/3/movie/popular')
                ->json()['results'];
  
    }

    public function genre()
    {
        $genreArr = Http::withToken(config('services.tmdb.token'))
            ->get('http://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];

        return $genres = collect($genreArr)->mapWithKeys(function ($genre){
            return  [$genre['id'] => $genre['name']];
        });
    }

    public function formatDate($date)
    {
        return \Carbon\Carbon::parse($date)->format('M d, Y');
    }

}
