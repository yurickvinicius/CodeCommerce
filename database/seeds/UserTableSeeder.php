<?php

/**
 * Created by PhpStorm.
 * User: yurickvinicius
 * Date: 21/07/15
 * Time: 22:52
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;

class UserTableSeeder extends Seeder
{

    public function run(){

        DB::table('users')->truncate();

        factory('CodeCommerce\User')->create(
            [
                'name' => 'yurick',
                'email' => 'yurick@gmail.com',
                'password' => Hash::make('vinicius')
            ]
        );

        factory('CodeCommerce\User',10)->create();

    }

}