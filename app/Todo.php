<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //
    protected $fillable = ['task_name' , 'task_description', 'task_status'];

    public $timestamps = true;
}
