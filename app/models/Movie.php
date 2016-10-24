<?php

class Movie extends Eloquent {

	protected $guarded = ['id'];

	public function categories() {
		return $this->belongsToMany('Category', 'movie_category', 'movie_id', 'category_id');
	}

	public function actors() {
		return $this->belongsToMany('Person', 'movie_actor', 'movie_id', 'actor_id')
			->withPivot('char_name');
	}
	
}