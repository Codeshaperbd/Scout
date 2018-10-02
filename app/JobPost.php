<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobPost extends Model
{  
    use Sluggable;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'broker_info_id','title', 'description', 'industry' , 'JobCategory', 'location','byemailapply','byurlapply','employment_type','education','qualifications', 'experience', 'responsibilities', 'skills', 'work_hour', 'estimated_salary', 'incentive', 'base_salary','is_active','deleted_at'
    ];
    //


    public function BrokerInfo() {
        return $this->belongsTo('App\BrokerInfo','broker_info_id');
    }

    public function PaymantDetails() {
        return $this->hasOne('App\PaymantDetails','job_id');
    }


    public function JobApply() {
        return $this->hasMany('App\PaymantDetails', 'job_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'broker_info_id');
    }


    public function State() {
        return $this->hasMany('App\State','location');
    }


}
