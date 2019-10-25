<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class NewMovieController extends Controller
{
    public function index()
    {
        $movies = Movie::orderby('rating', 'desc')
                ->limit(10)
                ->get();

        return view('movies/index', compact('movies'));     
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);

        return view('movies/show', compact('movie'));

    }
}
