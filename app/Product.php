<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   public function images()
   {
   	return $this->hasMany("App\Image");
   }

   public function params()
   {
   	return $this->hasMany("App\Param");
   }

   public function shop()
   {
   	return $this->belongsTo("App\Shop");
   }

   public function section()
   {
      return $this->belongsTo("App\Section");
   }
}
