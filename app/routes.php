<?php

Route::group(array('prefix' => 'admin'), function() {

	Route::group(['before' => 'auth'], function() {

		Route::get('test-image', function() {
			$img = Image::make("http://ia.media-imdb.com/images/M/MV5BMTY5NjQ3Njc3OF5BMl5BanBnXkFtZTcwMTg2MDA4Mg@@._V1_SX300.jpg");

			$pathinfo = pathinfo("http://ia.media-imdb.com/images/M/MV5BMTY5NjQ3Njc3OF5BMl5BanBnXkFtZTcwMTg2MDA4Mg@@._V1_SX300.jpg");

			$fileName = md5($pathinfo['filename'] . time()) . "." . $pathinfo['extension'];

			return $img->save('uploads/movies/posters/' . $fileName);
		});

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

		Route::get('auth/logout', 'AdminAuthController@logout');
	});

	Route::post('auth/login', [
		'as' => 'admin.auth.post-login', 
		'uses' => 'AdminAuthController@postLogin'
	]);
	Route::get('auth/login', 'AdminAuthController@login');
});

Route::get('/about', 'HomeController@about');
Route::get('/movie', [
	'as' => 'movie.index', 
	'uses' => 'MovieController@index'
]);
Route::get('/movie/{slug}', [
	'as' => 'movie.detail', 
	'uses' => 'MovieController@detail'
]);
Route::get('/genre/{genre}', [
	'as' => 'genre.detail', 
	'uses' => 'MovieController@genre'
]);
Route::get('/', 'HomeController@index');


