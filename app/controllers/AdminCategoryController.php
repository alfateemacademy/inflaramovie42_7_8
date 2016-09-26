<?php

class AdminCategoryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Category::get();
		return View::make('admin.category.index')
			->with('categories', $categories);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$parentCategories = Category::where('parent_id', 0)->get();
		return View::make('admin.category.create')
			->with('parentCategories', $parentCategories);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), [
			'category_name' => 'required|unique:categories',
			'description' => 'required'
		]);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Category::create([
			'category_name' => Input::get('category_name'),
			'slug' => Str::slug(Input::get('category_name')),
			'description' => Input::get('description'),
			'parent_id' => Input::get('parent_id')
		]);

		return Redirect::to('/admin/category');
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
		$category = Category::find($id);

		$parentCategories = Category::where('parent_id', 0)->get();

		return View::make('admin.category.edit')
			->with('category', $category)
			->with('parentCategories', $parentCategories);
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
			'category_name' => 'required|unique:categories,category_name,' . $id,
			'description' => 'required'
		]);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$category = Category::find($id);

		if($category)
		{
			$category->update([
				'category_name' => Input::get('category_name'),
				'slug' => Str::slug(Input::get('category_name')),
				'description' => Input::get('description'),
				'parent_id' => Input::get('parent_id')
			]);
		}

		return Redirect::to('/admin/category');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// Idea 1
		$category = Category::find($id);
		if($category)
		{
			$category->delete();
		}
		
		return Redirect::to('/admin/category');

		// Idea 2
		// Category::where('id', $id)->delete();

		// Idea 3
		// $category = Category::find($id);
		// $category->delete();
	}

	public function status($id) 
	{
		$category = Category::find($id);

		$new_status = ($category->category_status == 1) ? 0 : 1;

		$category->update([
			'category_status' => $new_status
		]);

		return Redirect::to('/admin/category');
	}


}
