@extends('layout')

@section('content')

<h2>{{$selected_movie->name}}</h2>

@if($reviews->count() == 0) 
    <p>No reviews yet!</p>

@else
    @foreach ($reviews as $review) 

        <div>
            <h5>{{$review->rating}}</h5>
            <p>{{$review->text}}</p>
        </div>

    @endforeach
@endif

    <a href="{{action('ReviewController@create', $selected_movie->id)}}">Write a review</a> 
        <br/>
    <a href="{{action('NewMovieController@show', $selected_movie->id)}}">Back to Movie</a>

@endsection