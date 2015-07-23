<?php

/**
 * Created by PhpStorm.
 * User: yurickvinicius
 * Date: 21/07/15
 * Time: 22:52
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder
{

    public function run(){

        DB::table('categories')->truncate();

        $faker = Faker::create();

        foreach(range(1,15) as $i){
            Category::create([
                'name' => $faker->word(),
                'description' => $faker->sentence()
            ]);
        }

        /*
        Category::create([
            'name' => 'Category 1',
            'description' => 'Description category 1'
        ]);

        Category::create([
            'name' => 'Category 2',
            'description' => 'Description category 2'
        ]);
        */

    }

}