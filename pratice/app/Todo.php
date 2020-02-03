<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table= "todo";

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function task()
    {
        return $this->belongsTo('App\Task','task_id');
    }
}
