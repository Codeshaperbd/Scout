<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLocation extends Model
{  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','country_id', 'state_id', 'city_id' , 'post_code', 'geo_tagging','lat','lng',
    ];

    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
