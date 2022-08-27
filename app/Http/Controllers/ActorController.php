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
}
