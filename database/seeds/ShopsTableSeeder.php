<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('shops')->insert([
		    'name' => str_random(10),
		    'description' => str_random(10),
		    'url' => 'http://' . str_random(5) . '.cz/',
		    'affiliate' => str_random(20)
		]);
    }
}
