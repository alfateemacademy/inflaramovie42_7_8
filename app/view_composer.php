<?php

View::share('name', (Auth::check()) ? Auth::user()->name : null);

View::composer('front.layouts.master', function($view) {
	$categories = Category::take(6)->get();

	return $view->with('categories', $categories);
});



