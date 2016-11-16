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

			DB::beginTransaction();

			try
			{
				$img = Image::make($movie['Poster']);

				$pathinfo = pathinfo($movie['Poster']);
				$fileName = md5($pathinfo['filename'] . time()) . "." . $pathinfo['extension'];

				$img->save('uploads/movies/posters/' . $fileName, 40);

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
					'original_poster' => $fileName
				]);

				if($newMovie)
				{
					$actors = explode(",", $movie['Actors']);

					$actorIds = null;
					foreach ($actors as $actor) {
						//$p = Person::where('source_id', $actor->imdbid)->first();

						//if(!$p)
						//{
							$person = Person::create([
								'person_name' => $actor,
								'slug' => Str::slug($actor),
								'person_status' => 1,
								'fullname' => $actor
							]);

							$actorIds[] = $person->id;
						//}
						//else
						//{
							//$actorIds[] = $p->id;
						//}
					}

					$newMovie->actors()->attach($actorIds);

					DB::commit();

					return Response::json(['added' => true, 'message' => 'Movie Added']);
				}
			}
			catch (\Exception $ex)
			{
				DB::rollback();
				$message = "Fatal Error";
				if($ex->getCode() == '42S22')
				{
					$message = 'Invalid column';
				}

				return Response::json(['added' => false, 'message' => $message]);
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
		$movie = Movie::find($id);

		try {

			$image = $movie->original_poster;

			if($movie->delete())
			{
				File::delete('uploads/movies/posters/' . $image);
			}

			return Redirect::route('admin.movie.index')->with('success', 'Your movie has been deleted.');
		} catch (\Exception $e) {
			if($e->getCode() == 23000)
			{
				return Redirect::back()->withErrors(['messsage' => 'You cannot delete movie....']);
			}
			/*if($e->getCode)
			return Redirect::back()->withErrors(['messsage' => $e->getMessage()]);*/
		}
		

		
	}

	public function status($id)
	{
		
	}


}
