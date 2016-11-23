<?php

class HomeController extends BaseController {

	public function index()
	{
		$movies = Movie::paginate(5);

		return View::make('front.home.index', compact('movies'));
	}

	public function about()
	{
		return View::make('front.home.index');
	}

}
