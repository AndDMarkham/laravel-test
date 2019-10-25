@extends('layout')

@section('content')
    <h1> {{ $headline }} </h1>

    <p>
        Today is {{ $date }}
    </p>

    <p> 
        <?php if ($admin) : ?>
            Hello, {{ $username }}
        <?php else : ?>
            Fuck off...
        <?php endif; ?>
    </p>

    <ul>
        <?php foreach ($top_movies as $movie) : ?>
            <li>
                {{ $movie->name }}
            </li>
        <?php endforeach; ?>
    </ul>
@endsection