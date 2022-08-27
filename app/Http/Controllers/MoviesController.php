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
            ->json()['results'];

            $genreArr = Http::withToken(config('services.tmdb.token'))
        ->get('http://api.themoviedb.org/3/genre/movie/list')
        ->json()['genres'];

        $genres = collect($genreArr)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });
           return view('movie.index', ['movies' => $movies, 'genres' => $genres]);
    }

    public function movies()
    {
     return Http::withToken(config('services.tmdb.token'))
                ->get('http://api.themoviedb.org/3/movie/popular')
                ->json()['results'];
  
    }

    public function tvSeries($id)
    {
     return Http::withToken(config('services.tmdb.token'))
                ->get('http://api.themoviedb.org/3/tv/'.$id)
                ->json();
  
    }

    public function getMovie(Request $request, $id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
                ->get('http://api.themoviedb.org/3/movie/'.$id)
                ->json();
                $casts = Http::withToken(config('services.tmdb.token'))
                ->get('http://api.themoviedb.org/3/movie/'.$id.'/credits')
                ->json()['cast'];
        return view('livewire.movie-info', ['movie' => $movie, 'casts' => $casts]);
    }

    public function getMovieApi(Request $request, $id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
                ->get('http://api.themoviedb.org/3/movie/'.$id)
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

    public function casts($id) {
        return Http::withToken(config('services.tmdb.token'))
        ->get('http://api.themoviedb.org/3/tv/'.$id.'/credits')
        ->json();
    }

    public function search (Request $request){
        if($request->query('people')) {
            $query = $request->query('people');
            return Http::withToken(config('services.tmdb.token'))
            ->get('http://api.themoviedb.org/3/search/people?query='.$query)
            ->json()['results'];
        }
        $query = $request->query('query');
        $result = Http::withToken(config('services.tmdb.token'))
        ->get('http://api.themoviedb.org/3/search/movie?query='.$query)
        ->json();

        return $result['results'];
    }
    
}
