<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

protected $table= "location";

   public function comments()
       {
           return $this->hasMany('App\User', 'loctaion_id', 'id');
       }

}
