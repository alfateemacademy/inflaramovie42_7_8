<?php

class AdminMovieActorController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($movieId)
	{
		$movie = Movie::with('actors')->find($movieId);
		//return $movie;
		$people = Person::lists('person_name', 'id');

		return View::make('admin.movie.actor.index')
			->with('people', $people)
			->with('movie', $movie);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($movieId)
	{
		$movie = Movie::find($movieId);

		$movie->actors()->attach(Input::get('actor_id'), [
			'char_name' => Input::get('char_name')
		]);

		return Redirect::back()->withMessage('Movie actor added');
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
	public function edit($movieId, $actorId)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($movieId, $actorId)
	{
		$movie = Movie::find($movieId);

		$movie->actors()->detach($actorId);

		return Redirect::back()->with('message', 'Actor Detach');
	}


}
