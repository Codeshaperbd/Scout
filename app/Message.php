<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{ 

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'sender_id','receiver_id', 'message', 'read_at' 
    ];


    public function sender() {
        return $this->belongsTo('App\User','sender_id');
    }



}
