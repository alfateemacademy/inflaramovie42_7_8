<?php

class MovieController extends \BaseController {

	
	public function detail($slug)
	{
		$movie = Movie::with('actors')->where('slug', $slug)->first();

		return View::make('front.movie.detail', compact('movie'));
	}


}
