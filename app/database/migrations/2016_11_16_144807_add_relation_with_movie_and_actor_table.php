<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationWithMovieAndActorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('movie_actor', function(Blueprint $table)
		{
			$table->foreign('movie_id', 'movie_actor_from_movies_fk')
			   ->references('id')
			   ->on('movies')
			   ->onDelete('cascade')
			   ->onUpdate('cascade');

			$table->foreign('actor_id', 'movie_actor_from_people_fk')
			   ->references('id')
			   ->on('people')
			   ->onDelete('cascade')
			   ->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('movie_actor', function(Blueprint $table)
		{
			$table->dropForeign('movie_actor_from_movies_fk');
			$table->dropForeign('movie_actor_from_people_fk');
		});
	}

}
