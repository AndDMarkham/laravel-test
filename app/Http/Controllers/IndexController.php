<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $title = 'Movie Database';
        
        $view = view('index', 
            [
                'title' => $title,
                'headline' => 'Welcome!'
            ]);
        
        $view->with('date', date('j. n. Y'));

        $view->with([
            'username' => 'Andrew',
            'admin' => true
        ]);

        $view->top_movies = \App\Movie::limit(10)->get();

        return $view;
    }
}
