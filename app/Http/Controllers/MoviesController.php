<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $movies = Http::withToken(config('services.tmdb.token'))
            ->get('http://api.themoviedb.org/3/movie/popular')
            ->json();

            $genreArr = Http::withToken(config('services.tmdb.token'))
        ->get('http://api.themoviedb.org/3/genre/movie/list')
        ->json()['genres'];

        $genres = collect($genreArr)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });

           return $genres;
    }

    public function movies()
    {
     return $movies = Http::withToken(config('services.tmdb.token'))
                ->get('http://api.themoviedb.org/3/movie/popular')
                ->json()['results'];
  
    }

    public function getMovie(Request $request, $id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
                ->get('http://api.themoviedb.org/3//movie/'.$id)
                ->json();
                $casts = Http::withToken(config('services.tmdb.token'))
                ->get('http://api.themoviedb.org/3/movie/'.$id.'/credits')
                ->json()['cast'];
        return view('livewire.movie-info', ['movie' => $movie, 'casts' => $casts]);
    }

    public function getMovieApi(Request $request, $id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
                ->get('http://api.themoviedb.org/3//movie/'.$id)
                ->json();
        // return view('livewire.movie-info', ['movie' => $movie]);

        return $movie;
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

    public function casts(Request $request, $id) {
        return $movie = Http::withToken(config('services.tmdb.token'))
        ->get('http://api.themoviedb.org/3/movie/'.$id.'/credits')
        ->json();
    }
    
}
