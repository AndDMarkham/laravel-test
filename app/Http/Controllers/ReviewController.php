<?php

namespace App\Http\Controllers;

use \DB;
use App\Review;
use App\Movie;
use App\Http\Requests\ReviewRequest;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($movie)
    {
        if (\Gate::denies('admin')) {
            return 'Please login';
        }

        if(\Gate::allows('admin')) {
            $selected_movie= Movie::findOrFail($movie);
            
            $reviews = $selected_movie->reviews()->get();

            // return $reviews;
            return view('reviews.index', compact('reviews', 'selected_movie'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($movie)
    {
        $movie = Movie::findOrFail($movie);

        return view('reviews.create', compact('movie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store($movie, ReviewRequest $request)
    {
        // $this->validate($request, [
        //     'value' => 'required|numeric|min:0|max:10',
        //     'text' => 'required|min:10|min:250'
        // ], [
        //     'value.required' => 'Don\'t forget to rate the movie!',
        //     'text.required' => 'Tell us what you thought!'
        // ]);

        $review = new Review();
        $review->user_id = auth()->id();
        $review->movie_id = $movie;
        $review->text = $request->input('text');
        $review->rating = $request->input('value');
        $review->save();

        return redirect(action('ReviewController@index', $movie));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
