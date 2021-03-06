<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index');

Route::get('/api', 'ApiController@index');
Route::get('/api/search/people', 'ApiController@search_people');
Route::get('/api/cast_crew', 'ApiController@cast_and_crew');

Route::get('/test/form', 'ApiController@form');
Route::post('/test/form','ApiController@handleForm');

Route::get('/api/movies', 'MovieController@movies');
Route::get('/api/movies/list', 'MovieController@index');
Route::get('/api/movies/cast_and_crew', 'MovieController@cast_and_crew');
Route::get('/api/movies/show', 'MovieController@show');

Route::get('/api/movie', 'MovieController@get_movie');

Route::get('/api/movies/favorite', 'FavoriteMovieController@status');
Route::post('/api/movies/favorite/toggle', 'FavoriteMovieController@toggle');

Route::post('/api/collection', 'CollectionController@store');
Route::get('/api/list/users', 'CollectionController@user_lists');


Route::get('/api/review', 'Api\ReviewController@index');
Route::post('/api/review', 'ReviewController@store');

Route::get('/api/rating', 'Api\RatingController@index');
Route::post('/api/rating', 'Api\RatingController@store');
Route::put('/api/rating', 'Api\RatingController@update');

// Route::resource('/api/review', 'ReviewController');
// Route::resource('/api/rating', 'RatingController');

Route::get('/api/tmd/top_rated', 'MorningWorkoutController@top_rated');
Route::get('/api/tmd/movie_of_the_week', 'MorningWorkoutController@movie_of_the_week');

Route::get('/movies', 'NewMovieController@index');
Route::get('/movies/{id}', 'NewMovieController@show');

Route::get('movies/{movie}/reviews', 'ReviewController@index');
Route::get('movies/{movie}/reviews/create', 'ReviewController@create')->middleware('auth');
Route::post('movies/{movie}/reviews/', 'ReviewController@store')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/person', 'NewPersonController');
// Route::resource('/person/{person_id}/comments', 'PersonCommentController');

Route::get('/email', 'EmailController@index');