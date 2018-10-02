<?php

namespace App;


use Laravel\Scout\Searchable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use Sluggable;
    use Searchable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    //
    protected $fillable = [

        'user_id',
        'category_id',
        'photo',
        'title',
        'body',
        'status'

    ];


    public function Admin(){
        return $this->belongsTo('App\Admin','user_id');
    }


    public function category(){
        return $this->belongsTo('App\category','category_id');
    }


}
