<?php

class CategoryTableSeeder extends Seeder {

    public function run()
    {

    	// DB::table('categories')->delete();
    	DB::table('categories')->truncate();

    	$faker = Faker\Factory::create();

    	for($i=0; $i<50; $i++) {
    		$categoryName = $faker->sentence(3);
    		DB::table('categories')->insert([
	        	'category_name' => $categoryName,
	        	'slug' => Str::slug($categoryName),
                'category_status' => $faker->boolean
	        ]);
    	}
        
    }

}