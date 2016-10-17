<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MoviesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('movies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('slug');
			$table->string('tagline')->nullable();
			$table->text('description')->nullable();
			$table->string('genres')->nullable();
			$table->integer('released_year')->nullable();
			$table->date('released_date')->nullable();
			$table->string('type')->nullable();
			$table->string('runtime')->nullable();
			$table->string('rating')->nullable();
			$table->string('votes')->nullable();
			$table->string('rated')->nullable();
			$table->string('original_poster')->nullable();
			$table->string('source_id')->nullable();
			$table->string('source_type')->nullable();
			$table->tinyInteger('movie_status')->default(0);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('movies');
	}

}
