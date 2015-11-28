<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
	protected $fillable = array('name', 'parent_id');

    public function products()
    {
    	return $this->hasMany('App\Product');
    }

    public function parent()
    {
    	return $this->belongsTo('App\Section', 'parent_id', 'id');
    }

    public function children()
    {
    	return $this->hasMany('App\Section', 'parent_id');
    }
}
