@extends('layout')

@section('content')

    <h1>Write a review for {{$movie->name}}!</h1>

        {{-- @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif --}}

    <form action="{{action('ReviewController@store', $movie->id)}}" method="post">

        @csrf

        <div>
            @if (count($errors) > 0)
                <div style="{{$errors->has('value') ? 'color: red' : ''}}">
                    {{$errors->first('value')}}<br/>
                </div>
            @endif
            <label for="value">Rating</label>
            <input name="value" type="number" value="{{old('value')}}">
        </div>
            <br/>
        <div>
            @if (count($errors) > 0)
                <div style="{{$errors->has('text') ? 'color: red' : ''}}">
                    {{$errors->first('text')}}<br/>
                </div>
            @endif
            <label for="text">Text</label>
            <textarea name="text" type="text">
                {{old('text')}}
            </textarea>
        </div>
            <br/>
        <button type="submit">Create</button>
    </form>    


@endsection