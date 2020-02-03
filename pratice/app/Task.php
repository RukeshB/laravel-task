<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

protected $table= "tasklist";

   public function todo()
       {
           return $this->hasMany('App\Task', 'task_id');
       }

}
