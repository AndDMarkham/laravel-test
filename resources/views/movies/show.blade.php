@extends('layout')

@section('content')

    <h1>
        {{$movie->name}}
    </h1>

    <img src={{$movie->poster_url}} alt="" style="width: 15rem;">

    <div style="display: flex;">
        <p style="padding: 1rem;">
            {{$movie->rating}}
        </p>
        <p style="padding: 1rem;">
            {{$movie->year}}
        </p>
    </div>

    <ul>
        @foreach($movie->genres as $genre)
            <li>{{$genre->name}}</li>
        @endforeach
    </ul>
    @can ('admin')
        <a href="{{action('ReviewController@index', $movie->id)}}">Reviews</a> 
    @endcan
    </br>
    <a href="{{action('NewMovieController@index')}}">Back to Movie List</a>

@endsection