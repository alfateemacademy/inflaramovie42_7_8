<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationWithMovieAndCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('movie_category', function(Blueprint $table)
		{
			$table->foreign('movie_id', 'movie_category_from_movies_fk')
			   ->references('id')
			   ->on('movies')
			   ->onDelete('cascade')
			   ->onUpdate('cascade');

			$table->foreign('category_id', 'movie_category_from_categories_fk')
			   ->references('id')
			   ->on('categories');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('movie_category', function(Blueprint $table)
		{
			$table->dropForeign('movie_id', 'movie_category_from_movies_fk');
			$table->dropForeign('category_id', 'movie_category_from_categories_fk');
		});
	}

}
