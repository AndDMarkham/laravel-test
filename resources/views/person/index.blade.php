@extends('layouts.app')

@section('content')

    <h1>People</h1>

    <ul>
        @foreach($persons as $person)
            <li>
                <a href="{{ action('NewPersonController@show', $person->id)}}">
                     {{$person->name}}
                </a>
            </li>
        @endforeach
    </ul>    

    {{ $persons->links() }}

@endsection