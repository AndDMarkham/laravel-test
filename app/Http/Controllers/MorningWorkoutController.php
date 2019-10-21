<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class MorningWorkoutController extends Controller
{
    public function top_rated()
    {
        $query = DB::table('movies');
        $query->orderby('rating', 'desc');
        $query->limit(10);

        $movies = $query->get();

        return $movies;
    }

    public function movie_of_the_week(Request $request)
    {
        if (!$request->has('id')) {
            $movie_id = 424;
        } else {
            $movie_id = $request->input('id');
        }

        $query = DB::table('movies');
        $query->where('id', $movie_id);

        $movie = $query->first();

        $genre_ids = DB::table('genre_movie')->where('movie_id', $movie_id)->pluck('genre_id');

        $genres = DB::table('genres')->whereIn('id', $genre_ids)->pluck('name');

        $cc_ids = DB::table('movie_person')->where('movie_id', $movie_id)->where('profession_id', 3)->limit(7)->pluck('person_id');

        $cast = DB::table('people')->whereIn('id', $cc_ids)->pluck('name');

        return [
            'movie' => $movie,
            'genres' => $genres,
            'cast' => $cast,
        ];
    }
}