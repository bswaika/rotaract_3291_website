<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventBlog extends Model
{
    protected $fillable = [
        'event_id',
        'title',
        'body',
    ];

    public function event(){
        return $this->belongsTo('App\Event');
    }
}
