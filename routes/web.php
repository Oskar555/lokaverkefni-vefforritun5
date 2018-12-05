<?php

use Illuminate\Support\Facades\Input;
use App\User;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/',function(){
	return view('home');
});

Route::get('/threads', 'ThreadsController@index');

Route::get('/threads/create', 'ThreadsController@create')->middleware('auth');

Route::get('/threads/{thread}', 'ThreadsController@show');

Route::post('/threads', 'ThreadsController@store')->middleware('auth');

Route::get('/threads/{thread}/edit', 'ThreadsController@edit')->middleware('auth');

Route::patch('/threads/{thread}', 'ThreadsController@update')->middleware('auth');

Route::delete('/threads/{thread}', 'ThreadsController@destroy')->middleware('auth');

Route::post('/threads/{thread}/comment', 'CommentsController@store')->middleware('auth');

Route::get('/threads/user/{user}', 'ThreadsController@index');

Route::post('threads/{thread}/upvote', 'ThreadsController@upvote');

Route::post('threads/{thread}/downvote', 'ThreadsController@downvote');

Route::get('threads/{thread}/categories','ThreadsController@categories');

Route::post('threads/{thread}/Image', 'ThreadsController@postImage');
