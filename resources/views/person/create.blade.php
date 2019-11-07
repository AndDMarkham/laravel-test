@extends('layouts.app')

@section('content')

    <h1>Create a new person</h1>

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="post" action="{{action('NewPersonController@store',)}}">
        @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input name="name" type="text" class="form-control" id="name" placeholder="Name">
              <small id="describe-name" class="form-text text-muted">Wait, who?</small>
            </div>
            <div class="form-group">
                <label for="photo_url">Photo URL</label>
                <input name="photo_url" type="text" class="form-control" id="photo_url" placeholder="photo url">
                <small id="describe-photo" class="form-text text-muted">Link a photo here.</small>
            </div>
            <div class="form-group">
                <label for="biography">Biography</label>
                <input name="biography" type="text" class="form-control" id="biography" placeholder="biography">
                <small id="describe-bio" class="form-text text-muted">Add a short biography.</small>
            </div>
            <div class="form-group">
                <label for="profession">Biography</label>
                <select name="profession_id" id="profession">
                    @foreach($professions as $profession)
                        <option value="{{$profession->id}}">            {{$profession->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    <a href="{{action('NewPersonController@index')}}">
        Back to list
    </a>

@endsection