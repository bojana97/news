<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@index');
Route::resource('page', 'PageController');

//display all posts(pages)
Route::get('page/index', 'PageController@index');

//display one page based on id
Route::get('page/{$id}', 'PageController@show');

//create new page
Route::get('page/create', 'PageController@create');

// store new page
Route::post('page/store', 'PageController@store');

// for showing the form
Route::get('page/{id}/edit', 'PageController@edit');

// for sending changes to the database
Route::put('page/{$id}' , 'PageController@update');



Auth::routes();
//after register or login redirect to dasboard with only users pages
Route::get('/dashboard', 'DashboardController@index');

//store a comment
Route::post('page/store', 'CommentController@store');
