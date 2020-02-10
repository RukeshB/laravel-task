<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskGroup extends Model
{

protected $table= "task_group";

   public function task()
       {
           return $this->hasMany('App\Task', 'group_id');
       }

}
