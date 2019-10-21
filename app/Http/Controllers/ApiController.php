<?php
 
namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
 
class ApiController extends Controller
{
    public function index()
    {
        // the logic of your page will be here
        $query = "  SELECT *
                    FROM `movies`
                    WHERE 1
                    ORDER BY `rating` DESC
                    LIMIT 10
                ";

        $top_movies = DB::select($query);

        return $top_movies;
        // as response we will return an array of data
        return [
            'success' => true,
            'message' => 'Response successfully returned.',
            'errors' => [],
            'data' => []
        ];
    }

    public function search_people(Request $request)
    {
        if (!$request->has('search')) {
            return [
                'error' => 'Please specify search parameter'           
            ];
        }

        $search_parameter = $request->input('search');

        $query = "  SELECT *
                    FROM `people`
                    WHERE `name` LIKE ?
                ";

        $people = DB::select($query, ["%{$search_parameter}%"]);

        return $people;
    }

    public function cast_and_crew(Request $request)
    {
        if (!$request->has('id')) {
            return [
                'error' => 'Please specify movie ID'
            ];
        }

        $movie_id = $request->input('id');

        $query = "  SELECT *
                    FROM `movie_person`
                    WHERE `movie_id` = ?
                ";

        $cast_n_crew = DB::select($query, [ $movie_id ]);

        $person_ids = [];

        foreach ($cast_n_crew as $person) {

            $person_ids[] = $person->person_id;

            // equivalent to -- array_push($person_ids, $person->person_id)

        }

        $person_ids_string = join(', ', $person_ids);

        // return $person_ids_string;

        $query = "  SELECT *
                    FROM `people`
                    WHERE `id` IN ({$person_ids_string})
                ";

        // return $query;

        $people = DB::select($query);
        
        return $people;
    }

    public function form()
    {
        return view('form');
    }

    public function handleForm(Request $request)
    {
        // $request = request(); // alternative to injecting method in par

        $search_term = $request->input('search');

        dd($search_term);
    }
}

