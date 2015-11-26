<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('xmlheureka', 'XmlFeedController@heurekaImport');

Route::get('test', function() {
	$p = new App\Libraries\Product;
	$p->product_id = 1;
	$p->shop_id = 243;
	$p->set("product_name", "test");

	$p->save();
});