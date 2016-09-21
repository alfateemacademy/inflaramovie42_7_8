<?php

class Category extends Eloquent {

	//protected $table = 'category';

	protected $fillable = [
		'category_name', 'slug', 'description', 'parent_id', 'category_status'
	];
	
}