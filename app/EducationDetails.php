<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationDetails extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','country_of_college', 'institute_name', 'degree' , 'major', 'graduation_date', 'cgpa',
    ];

    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
