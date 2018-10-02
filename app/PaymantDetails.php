<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;

class PaymantDetails extends Model
{
    use Billable;
    //
	protected $table = 'paymant_details';

    protected $fillable = [
        'job_id','stripe_id',
    ];



    public function JobPost() {
        return $this->belongsTo('App\JobPost','job_id');
    }

    public function Subscription() {
        return $this->hasOne('App\Subscription' ,'paymant_details_id');
    }


}
