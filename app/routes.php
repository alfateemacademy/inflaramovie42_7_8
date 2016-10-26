<?php

Route::group(array('prefix' => 'admin'), function() {
	Route::post('/', 'AdminHomeController@store');
	Route::get('/', 'AdminHomeController@index');

	Route::delete('category/{id}', 'AdminCategoryController@destroy');
	Route::put('category/{id}/status', 'AdminCategoryController@status');
	Route::put('category/{id}', 'AdminCategoryController@update');
	Route::get('category/{id}/edit', 'AdminCategoryController@edit');
	Route::post('category', 'AdminCategoryController@store');
	Route::get('category/create', 'AdminCategoryController@create');
	Route::get('category', 'AdminCategoryController@index');

	Route::put('person/{id}/status', [
		'as' => 'admin.person.status', 
		'uses' => 'AdminPersonController@status'
	]);
	Route::resource('person', 'AdminPersonController');

	// Route::get('movie/{id}/actor', 'AdminMovieActorController@index');
	Route::resource('movie.actor', 'AdminMovieActorController');

	Route::put('movie/{id}/status', [
		'as' => 'admin.movie.status', 
		'uses' => 'AdminMovieController@status'
	]);
	Route::resource('movie', 'AdminMovieController');
	Route::resource('user', 'AdminUserController');
});

Route::get('/', function() {
	return "adsfdsafdsfsd";
});


