<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class FAQ extends Model
{
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'question'
            ]
        ];
    }

	protected $table = 'f_a_qs';

    protected $fillable = [
        'question',
        'answer',
        'faq_for',
        'status',
    ];
}
