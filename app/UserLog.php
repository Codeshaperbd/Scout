<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
	protected $fillable = [
        'user_id', 'last_login', 'last_job_apply',
    ];

    //
    public function User() {
        return $this->belongsTo('App\User');
    }
}
