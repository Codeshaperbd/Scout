<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienceDetails extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','title', 'is_current', 'start_date' , 'end_date', 'description',
    ];

    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
