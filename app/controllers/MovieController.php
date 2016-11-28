<?php

class MovieController extends \BaseController {

	public function index()
	{
		$movies = Movie::with('ratings')->paginate(5);

		return View::make('front.movie.index', compact('movies'));
	}
	
	public function detail($slug)
	{
		Auth::loginUsingId(2);
		$movie = Movie::with('actors', 'ratings')->where('slug', $slug)->first();

		$count = $movie->ratings()->count();
		$totalRatings = $movie->ratings()->sum('rating');
		$average = $totalRatings / $count;

		return View::make('front.movie.detail', compact('movie', 'average'));
	}

	public function genre($genre)
	{
		$movies = Movie::where('genres', 'LIKE', '%' . $genre . '%')->paginate(5);
		$latestMovies = Movie::orderBy('id', 'DESC')->take(5)->get();

		return View::make('front.movie.genre', compact('movies', 'genre', 'latestMovies'));
	}

	public function saveRating($movieId)
	{
		$movie = Movie::find($movieId);

		if(!Auth::check())
		{
			return Response::json(['status' => false]);
		}

		$userId = Auth::user()->id;

		$rating = DB::table('movie_rating')->where('movie_id', $movieId)
			->where('user_id', $userId);

		if($rating->first())
		{
			$rating->update(['rating' => Input::get('value')]);
			//$movie->ratings()->sync([$userId], ['rating' => Input::get('value')]);
		}
		else
		{
			$movie->ratings()->attach($userId, ['rating' => Input::get('value')]);
		}

		return Response::json(['status' => true]);
	}


}
