<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActorController extends Controller
{
    public function actors() {
        $actors = Http::withToken(config('services.tmdb.token'))
        ->get('http://api.themoviedb.org/3/person/popular')
        ->json()['results'];

       
        return view('actors.index', ['actors' =>collect($actors)->paginate(12)]);
    }

    public function show($id) {
        $actor = Http::withToken(config('services.tmdb.token'))
        ->get('http://api.themoviedb.org/3/person/'.$id)
        ->json();

        $socials = Http::withToken(config('services.tmdb.token'))
        ->get('http://api.themoviedb.org/3/person/'.$id.'/external_ids')
        ->json();
        
        $credits = Http::withToken(config('services.tmdb.token'))
        ->get('http://api.themoviedb.org/3/person/'.$id.'/combined_credits')
        ->json();
        // return $actor;
        // dump($actor);
        // dump($socials);
        // dump($credits);

        // $title = collect($credits)->get('cast');
        // $credit = collect($title)->where('media_type', 'movie')
        // ->sortByDesc('popularity')->take(8);
        // dump($credit);

        return view('actors.show', [
            'actor' => $actor,
            'socials' => $socials,
            'credits' => $credits,
        ]);
           
    }

}