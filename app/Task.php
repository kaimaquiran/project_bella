<?php

namespace PMS;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'task_name','description','project_id','task_assigned_to','task_status','task_progress','task_priority'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
