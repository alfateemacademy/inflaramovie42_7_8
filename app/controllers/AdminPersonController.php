<?php

class AdminPersonController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('csrf', ['on' => ['post', 'put']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $people = Person::paginate(Input::get('per_page'));

		$people = Person::where('fullname', 'LIKE', '%' . Input::get('q') . '%')
			->orWhere('person_name', 'LIKE', '%' . Input::get('q') . '%')
			->orWhere('person_status', Input::get('status'))
			->paginate();

		return View::make('admin.person.index')
			->with('people', $people);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.person.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		//return Input::file('original_poster')->move('uploads/person', 'asif.jpg');
		// return Input::all();

		$validator = Validator::make(Input::all(), [
			'person_name' => 'required'
		]);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$fileName = null;
		if(Input::hasFile('original_poster'))
		{
			$file = Input::file('original_poster');
			// sdlkfjdasklfjadsklfjadskfjlklj.jpg
			$fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
			$file->move('uploads/person', $fileName);
		}

		Person::create([
			'person_name' => Input::get('person_name'),
			'slug' => Str::slug(Input::get('person_name')),
			'fullname' => Input::get('fullname'),
			'bio' => Input::get('bio'),
			'original_poster' => $fileName
		]);

		return Redirect::route('admin.person.index');
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
		$person = Person::find($id);

		return View::make('admin.person.edit')
			->with('person', $person);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// return Input::all();
		$validator = Validator::make(Input::all(), [
			'person_name' => 'required',
			'fullname' => 'required'
		]);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$person = Person::find($id);

		$oldPoster = $person->original_poster;

		$fileName = $person->original_poster;

		if(Input::hasFile('original_poster'))
		{
			$file = Input::file('original_poster');
			// sdlkfjdasklfjadsklfjadskfjlklj.jpg
			$fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
			$file->move('uploads/person', $fileName);

			File::delete('uploads/person/' . $oldPoster);
		}


		$person->update([
			'person_name' => Input::get('person_name'),
			'slug' => Str::slug(Input::get('person_name')),
			'fullname' => Input::get('fullname'),
			'bio' => Input::get('bio'),
			'original_poster' => $fileName
		]);

		return Redirect::route('admin.person.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
