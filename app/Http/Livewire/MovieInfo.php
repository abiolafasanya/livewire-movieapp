<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class MovieInfo extends Component
{
    public function render()
    {
        return view('livewire.movie-info');
    }

    public function casts($movie_id)
    {
     return $movies = Http::withToken(config('services.tmdb.token'))
                ->get('http://api.themoviedb.org/3/movie/'.$movie_id.'/credits')
                ->json();
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
