<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('CategoryTableSeeder');
		$this->call('PersonTableSeeder');
		$this->call('MovieTableSeeder');
		$this->call('UserTableSeeder');
	}

}
