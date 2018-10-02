<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','job_title', 'profile_img', 'industry' , 'bth_day', 'birth_month','birth_year','gander','position','cover_letter','alert',
    ];
    //


    public function user() {
        return $this->belongsTo('App\User','user_id');
    }

    //setup relation with photo model
    public function country(){
        return $this->belongsTo('App\Country');
    }
        //setup relation with photo model
    public function state(){
        return $this->belongsTo('App\State');
    }
        //setup relation with photo model
    public function city(){
        return $this->belongsTo('App\City');
    }
}
