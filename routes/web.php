<?php

Auth::routes();

Route::get('/', function () {
    return view('index');
});

//Book's routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/books', 'BookController@index');
Route::get('/books/create', 'BookController@create');
Route::post('/books/store', 'BookController@store');
Route::get('/books/{id}', 'BookController@show');
Route::get('/books/{id}/edit', 'BookController@edit');
Route::put('/books/{book}/update', 'BookController@update');
Route::get('/books/{id}/destroy', 'BookController@destroy');

//Author's routes
Route::get('/authors', 'AuthorController@index');
Route::get('/authors/create', 'AuthorController@create');
Route::post('/authors/store', 'AuthorController@store');
Route::get('/authors/{id}', 'AuthorController@show');
Route::get('/authors/{id}/edit', 'AuthorController@edit');
Route::put('/authors/{author}/update', 'AuthorController@update');
Route::get('/authors/{id}/destroy', 'AuthorController@destroy');


