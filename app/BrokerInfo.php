<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrokerInfo extends Model
{ 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','name', 'profile_img', 'phone' , 
    ];


    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function JobPost() {
        return $this->hasMany('App\JobPost','broker_info_id');
    }
}
