<?php

namespace App\Libraries;

use App;

class Loader
{	
	public static function load()
	{
		return App\Shop::all();
	}
}