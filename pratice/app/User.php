<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','role','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function location()
    {
        return $this->belongsTo('App\Location','loctaion_id','id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function task()
    {
        return $this->hasMany('App\Task','user_id');
    }

    public function hasAccess($permissions)
    {

        if($this->role->permission->contains('name',$permissions)){
            return true;
        }
        else{
            return false;
        }
        // foreach($this->role->permission as $p)
        // {
        //     dd($p->name, $permission);
        //     if($p->name == $permission)
        //     {
        //         dd("Here");
        //         return true;
        //     }
        //     else{
        //         dd("Hi");
        //         return false;
        //     }
        // }
    }
}
