<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentInfo extends Model
{   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','licensed', 'licensed_type', 'expericnce' , 'resume', 'linkedin','where_know',
    ];

    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
}
