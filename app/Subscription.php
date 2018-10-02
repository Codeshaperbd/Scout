<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    //	
    protected $table = 'subscriptions';

    protected $fillable = [
        'paymant_details_id','name','stripe_id','stripe_plan','quantity','trial_ends_at','ends_at','created_at'
    ];



    public function PaymantDetails() {
        return $this->belongsTo('App\PaymantDetails','paymant_details_id');
    }
}
