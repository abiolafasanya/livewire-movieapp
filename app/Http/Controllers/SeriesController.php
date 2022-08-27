<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Http::withToken(config('services.tmdb.token'))
        ->get('http://api.themoviedb.org/3/tv/popular')->json()['results'];

        $genreArr = Http::withToken(config('services.tmdb.token'))
            ->get('http://api.themoviedb.org/3/genre/tv/list')
            ->json()['genres'];

        $genres = collect($genreArr)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });

        return view('series.index', ['movies' => $movies, 'genres' => $genres]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movies = Http::withToken(config('services.tmdb.token'))
        ->get('http://api.themoviedb.org/3/tv/'.$id)->json();

        // dd($movies);

        $genreArr = Http::withToken(config('services.tmdb.token'))
            ->get('http://api.themoviedb.org/3/genre/tv/list')
            ->json()['genres'];

        $genres = collect($genreArr)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });

        $casts = Http::withToken(config('services.tmdb.token'))
        ->get('http://api.themoviedb.org/3/tv/'.$id.'/credits')
        ->json()['cast'];

        return view('series.show', ['movie' => $movies, 'genres' => $genres, 'casts'=> $casts]);
    }

 
}
