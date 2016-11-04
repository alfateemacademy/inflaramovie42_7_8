<?php

class AdminMovieController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('csrf', ['on' => ['post']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$movies = Movie::with('categories')->orderBy('id', 'DESC')->paginate();

		// return $movies;

		return View::make('admin.movie.index')
			->with('movies', $movies);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::lists('category_name', 'id');

		return View::make('admin.movie.create')->with('categories', $categories);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Request::ajax())
		{
			$movie = Input::get('movie');

			$newMovie = Movie::create([
				'title' => $movie['Title'],
				'slug' => Str::slug($movie['Title']),
				'genres' => $movie['Genre'],
				'description' => $movie['Plot'],
				'runtime' => $movie['Runtime'],
				'released_year' => $movie['Year'],
				'released_date' => date('Y-m-d', strtotime($movie['Released'])),
				'source_id' => $movie['imdbID'],
				'source_type' => 'imdb',
				'type' => $movie['Type'],
				'original_poster' => $movie['Poster']
			]);

			if($newMovie)
			{
				return Response::json(['added' => true, 'message' => 'Movie Added']);
			}

			return Response::json(['added' => false, 'message' => 'Movie not added']);

		}

		$validator = Validator::make(Input::all(), [
			'title' => 'required'
		]);

		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$movie = Movie::create([
			'title' => Input::get('title'),
			'slug' => Str::slug(Input::get('title'))
		]);

		$movie->categories()->attach(Input::get('category_ids'));

		/*foreach (Input::get('category_ids') as $id) {
			DB::table('movie_category')->insert([
				'movie_id' => $movie->id,
				'category_id' => $id
			]);
		}*/

		return Redirect::route('admin.movie.index');

		
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$categories = Category::lists('category_name', 'id');
		$movie = Movie::with('categories')->find($id);

		$selectedCategories = $movie->categories->lists('id');

		return View::make('admin.movie.edit')
			->with('movie', $movie)
			->with('categories', $categories)
			->with('selectedCategories', $selectedCategories);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Validator::make(Input::all(), [
			'title' => 'required'
		]);

		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$movie = Movie::find($id);

		$movie->update([
			'title' => Input::get('title'),
			'slug' => Str::slug(Input::get('title'))
		]);

		$movie->categories()->sync(Input::get('category_ids'));

		/*DB::table('movie_category')->where('movie_id', $movie->id)->delete();

		foreach (Input::get('category_ids') as $id) {
			DB::table('movie_category')->insert([
				'movie_id' => $movie->id,
				'category_id' => $id
			]);
		}*/

		return Redirect::route('admin.movie.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function status($id)
	{
		//
	}


}
