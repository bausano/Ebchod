<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
	protected $fillable = array('name', 'parent_id');

    public function products( )
    {
    	return $this->hasMany('App\Product');
    }
}
