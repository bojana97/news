<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@index');
Route::resource('page', 'PageController');

//display all posts(pages)
Route::get('page/index', 'PageController@index')->name('page/index');

//display one page based on id
Route::get('page/{$id}', 'PageController@show');

/*  EDIT AND UPDATE   */
//edit page/ for showing the form
Route::get('page/{id}/edit', 'PageController@edit');

//update page /for sending these changes to the database
Route::put('page/{$id}' , 'PageController@update');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
