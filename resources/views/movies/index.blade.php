@extends('layout')

@section('content')

    <h1>Movies</h1>
    <div>

        @foreach($movies as $movie)

            <div>
               <a href="@can('movie_detail', $movie)
               {{action('NewMovieController@show', $movie->id)}}
                @endcan" style="color: black; text-decoration: none;"> <h2>{{ $movie->name }}</h2></a>
                <img src={{$movie->poster_url}} alt="" style="width: 15rem;" />
                <p>{{ $movie->year }}</p>
                <p>{{$movie->rating }}</p>

            </div>

        @endforeach

    </div>

@endsection