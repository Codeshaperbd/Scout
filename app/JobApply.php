<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApply extends Model
{
    //    
    protected $fillable = [
        'user_id','broker_info_id','job_id','status', 'cover_letter','is_qualify' 
    ];


    public function user() {
    	return $this->belongsTo('App\User');
    }
    public function JobPost() {
    	return $this->belongsTo('App\JobPost', 'job_id');
    }
}
