<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;


    protected $date=['deleted_at'];

    protected $fillable=[
        'task',
        'task_value',
        'start_date',
        'finish_date',
        'status',
        'user_id',
        'user'
    ];
    public function users(){

        return $this->hasMany('App\User');
    }
   
}
