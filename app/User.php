<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable=[
        'first_name',
        'middle_name',
        'last_name',
        'task_id'
    ];
    public function tasks(){

        return $this->belongsToMany('App\Task');
    }

 



}
