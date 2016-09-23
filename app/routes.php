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
});

Route::get('/', function() {
	return "adsfdsafdsfsd";
});


