<?php

class Movie extends Eloquent {

	protected $guarded = ['id'];

	public function categories() {
		return $this->belongsToMany('Category', 'movie_category', 'movie_id', 'category_id');
	}
	
}