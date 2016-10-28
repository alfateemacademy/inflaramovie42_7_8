<?php

class AdminAuthController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function login()
	{
		if (Auth::viaRemember())
		{
			return Redirect::to('/admin/movie');
		}

		return View::make('admin.auth.login');
	}

	public function postLogin()
	{
		if(Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')], Input::get('remember')))
		{
			return Redirect::intended('/admin/movie');
		}

		return Redirect::back()->withInput()->withErrors(['message' => 'Invalid email and/or password.']);
	}

	public function logout()
	{
		Auth::logout();

		return Redirect::to('/admin/auth/login');
	}


}
