<?php

namespace App\Http\Controllers\Api;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
   public function index()
   {
       return DB::table('reviews')
            ->get();
   }

   public function store(Request $request)
   {
        $movie_id = $request->input('movie-id');
        $user_id = $request->input('pmovie-id');
        $movie_id = $request->input('movie-id');
        $movie_id = $request->input('movie-id');
        


        DB::table('reviews')
            ->insert([
                'movie_id' => 368,
                'user_id' => 1,
                'text' => 'Valar morghulis.',
                'rating' => 8
            ]);

        $new_id = DB::getPdo()->lastInsertId();

        return [
            'status' => 'success',
            'message' => 'Uploaded successfully.',
            'data' => [
                'id' => $new_id
            ]

        ];    
   }

}
