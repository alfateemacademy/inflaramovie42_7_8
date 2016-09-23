<?php

class Category extends Eloquent {

	// protected $table = 'category';

	// protected $primaryKey = 'cat_id';

	protected $fillable = [
		'category_name', 'slug', 'description', 'parent_id', 'category_status'
	];
	
}