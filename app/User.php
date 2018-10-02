<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;

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
                'source' => 'name'
            ]
        ];
    }

 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lname', 'email', 'number' , 'password', 'role_id','is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role() {
        return $this->belongsTo('App\Role');
    }


    public function UserLog() {
        return $this->hasMany('App\UserLog');
    }

    public function ExperienceDetails() {
        return $this->hasOne('App\ExperienceDetails');
    }

    public function EducationDetails() {
        return $this->hasOne('App\EducationDetails');
    }

    public function UserLocation() {
        return $this->hasOne('App\UserLocation');
    }

    public function resume() {
        return $this->hasOne('App\Resume','user_id');
    }


    public function JobPost() {
        return $this->hasMany('App\JobPost', 'broker_info_id');
    }


    public function BrokerInfo() {
        return $this->hasOne('App\BrokerInfo');
    }
    
    public function AgentInfo() {
        return $this->hasOne('App\AgentInfo');
    }


    public function Message() {
        return $this->hasMany('App\Message','sender_id');
    }
    
}
