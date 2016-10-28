<?php

class AdminUserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Input::has('type') && Input::get('type') == 'trashed')
		{
			$users = User::onlyTrashed()->get();
		}
		else
		{
			$users = User::get();
		}

		// return $users;


		return View::make('admin.user.index', compact('users'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.user.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), [
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required|confirmed',
			'password_confirmation' => 'required'
		]);

		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}

		User::create([
			'name' => Input::get('name'),
			'email' => Input::get('email'),
			'password' => Hash::make(Input::get('password'))
		]);

		return Redirect::route('admin.user.index')->with('message', 'User Added');
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
		$user = User::find($id);

		return View::make('admin.user.edit', compact('user'));
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
			'name' => 'required',
			'email' => 'required|email|unique:users,email,' . $id,
			'password' => 'required_with:password_confirmation|confirmed'
		]);

		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$user = User::find($id);

		$input = Input::except('_token', 'password', 'password_confirmation');

		if(Input::has('password_confirmation'))
		{
			$input['password'] = Hash::make(Input::get('password'));
		}

		$user->update($input);

		return Redirect::route('admin.user.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::withTrashed()->find($id);	

		if($user->trashed())
		{
			$user->restore();
		}
		else
		{
			$user->delete();
		}

		return Redirect::back()->with('message', 'User Deleted');
	}


}
