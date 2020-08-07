<?php

use Illuminate\Support\Facades\Route;


//Pages
Route::get('/', 'PageController@index');
Route::resource('page', 'PageController');


//After register or login redirect to dasboard with only users pages
Auth::routes();
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

//Store a comment
Route::post('page/store', 'CommentController@store');

//Categories
Route::get('categories', 'CategoryController@index')->name('categories');
Route::get('category/{category}', 'CategoryController@display');
Route::post('category/store', 'CategoryController@store');
Route::get('category/{id}/edit', 'CategoryController@edit');
Route::put('category/{id}' , 'CategoryController@update');
Route::delete('category/{id}', 'CategoryController@destroy');

