<?php

use Illuminate\Database\Seeder;

class MovieTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('movies')->truncate();

        $faker = Faker\Factory::create();

        for($i=0; $i<10; $i++) {
            $title = $faker->company();
            DB::table('movies')->insert([
                'title' => $title,
                'slug' => Str::slug($title),
            ]);
        }

    }

}