<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MovieRatingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('movie_rating', function(Blueprint $table)
		{
			$table->integer('movie_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->double('rating', 8, 2);

			$table->unique(['movie_id', 'user_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('movie_rating');
	}

}
