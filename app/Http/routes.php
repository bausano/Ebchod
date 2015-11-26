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

/**
 * Page routes
 */
Route::get('/', function () {
    return view('welcome');
});


/**
 * XmlImport Routes
 */
Route::get('xmlheureka', 'XmlFeedController@heurekaImport');





Route::get('test', function() {
	$product = App\Product::find(1);
	var_dump( $product->section->parent->parent );
});