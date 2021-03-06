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

    public function taskgroup()
    {
        return $this->belongsTo('App\TaskGroup', 'group_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
