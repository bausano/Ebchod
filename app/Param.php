<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Param extends Model
{
    public function product() 
    {
    	return $this->belongsTo("App\Product");
    }
}
