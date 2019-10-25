<?php

namespace App\Http\Controllers;

use DB;
use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {   
        $orderby = $request->input('orderby', 'name');

        if (!in_array($orderby, ['name', 'rating', 'year'])) {
            $orderby = 'name';
        }

        $orderway = $request->input('orderway', 'asc');
        $limit = $request->input('limit', 10);
        $page = max(1, $request->input('page', 1));
        $search = $request->input('search', null);
        $year = $request->input('year', null);
        $minrating = $request->input('minrating', null);

        //query builder initialization
        $query = DB::table('movies');
         
        //modification of query builder
        $query->orderBy($orderby, $orderway)
            ->limit($limit)
            ->offset(($page * $limit) - $limit);
            
        if ($search !== null) {
            $query->where('name', 'like', "%{$search}%");
        } 

        if ($year !== null) {
            $query->where('year', $year);
        }  

        if ($minrating !== null) {
            $query->where('rating', '>=', $minrating);
        }  

        //execute query and get results
        $movies = $query->get();
        
        return $movies;

    }


    public function cast_and_crew(Request $request)
    {
        $id = $request->input('id');

        if ($id === null) {
            return [];
        }

        $person_ids = DB::table('movie_person')->where('movie_id', $id)->pluck('person_id');

        $cast_and_crew = DB::table('people')->whereIn('id', $person_ids)->get();

        return $cast_and_crew;

    }

    public function show(Request $request)
    {
        $id = $request->input('id');

        $movie = \App\Movie::find($id);

        $ratings = $movie->ratings;

        $people = $movie->people;

        return $people;
        // return $ratings;
    }


    public function movies()
    {
        $query_builder = DB::table('movies');
        $query_builder->where('rating', '>', 8);
        $query_builder->orderBy('name', 'asc');
        $query_builder->limit(10);

        $movies = $query_builder->get();

        return $movies;
    }


    public function get_movie(Request $request)
    {
        $id = $request->input('id');

        return Movie::find($id);


    }
}
