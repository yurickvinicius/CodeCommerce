<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Tag;

class TagTableSeeder extends Seeder
{

    public function run(){

        DB::table('tags')->truncate();

        factory('CodeCommerce\Tag',20)->create();
    }

}