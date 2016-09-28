<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PeopleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('people', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('person_name');
			$table->string('slug');
			$table->string('fullname')->nullable();
			$table->text('bio')->nullable();
			$table->date('birth_date')->nullable();
			$table->string('birth_place')->nullable();
			$table->date('death_date')->nullable();
			$table->string('death_place')->nullable();
			$table->string('original_poster')->nullable();
			$table->string('source_id')->nullable();
			$table->string('source_type')->nullable();
			$table->tinyInteger('person_status')->default(0);
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
		Schema::drop('people');
	}

}
