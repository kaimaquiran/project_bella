<?php

namespace PMS;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'project_name','description','creator','project_assigned_to','project_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function user()
    {
        return $this->belongsTo('PMS\UserInfo','project_assigned_to','user_id'); 
    }

    public function creator()
    {
        return $this->belongsTo('PMS\UserInfo','creator','user_id');
    }
}
