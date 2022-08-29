<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    public function index()
    {
        $movies = Http::withToken(config('services.tmdb.token'))
            ->get('http://api.themoviedb.org/3/movie/popular')
            ->json()['results'];

            $genreArr = Http::withToken(config('services.tmdb.token'))
        ->get('http://api.themoviedb.org/3/genre/movie/list')
        ->json()['genres'];

        $genres = collect($genreArr)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });
           return view('movies.index', ['movies' => collect($movies)->paginate(8), 'genres' => $genres]);
    }

    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
                ->get('http://api.themoviedb.org/3/movie/'.$id)
                ->json();
                $casts = Http::withToken(config('services.tmdb.token'))
                ->get('http://api.themoviedb.org/3/movie/'.$id.'/credits')
                ->json()['cast'];
    
        return view('movies.show', ['movie' => $movie, 'casts' => collect($casts)->paginate(4)]);
    }
}
