<?php

namespace App;


use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
	use Searchable;
    //   
    protected $fillable = [
        'name',
        'country_id',
    ];


    
    public function JobPost() {
        return $this->hasMany('App\JobPost','location');
    }

}
