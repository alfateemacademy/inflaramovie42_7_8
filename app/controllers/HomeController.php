<?php

class HomeController extends BaseController {

	public function index()
	{
		return View::make('front.home.index');
	}

	public function about()
	{
		return View::make('front.home.index');
	}

}
