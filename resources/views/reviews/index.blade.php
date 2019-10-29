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
            @if ($review->user)
            <p>-{{ $review->user->name }}</p>
            @endif
        </div>

    @endforeach
@endif

    {{-- @if (auth()->check() && \Gate::allows('create_review', $selected_movie))
        <a href="{{action('ReviewController@create', $selected_movie->id)}}">Write a review</a>
    @endif  --}}

    @can('create_review')
        <a href="{{action('ReviewController@create', $selected_movie->id)}}">Write a review</a>
    @endcan
        <br/>
    <a href="{{action('NewMovieController@show', $selected_movie->id)}}">Back to Movie</a>

@endsection