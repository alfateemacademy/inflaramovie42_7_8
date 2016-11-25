<?php

class MovieController extends \BaseController {

	public function index()
	{
		$movies = Movie::paginate(5);

		return View::make('front.movie.index', compact('movies'));
	}
	
	public function detail($slug)
	{
		$movie = Movie::with('actors')->where('slug', $slug)->first();

		return View::make('front.movie.detail', compact('movie'));
	}

	public function genre($genre)
	{
		$movies = Movie::where('genres', 'LIKE', '%' . $genre . '%')->paginate(5);
		$latestMovies = Movie::orderBy('id', 'DESC')->take(5)->get();

		return View::make('front.movie.genre', compact('movies', 'genre', 'latestMovies'));
	}


}
