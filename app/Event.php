<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'club_id',
        'name',
        'venue',
        'description',
        'start_date',
        'end_date',
        'reg_open_date',
        'reg_close_date',
        'reg_amount',
        'fb_link',
        'tw_link',
        'ins_link',
        'status',
        'visibility',
    ];

    public function club(){
        return $this->belongsTo('App\Club');
    }

    public function blog(){
        return $this->hasOne('App\EventBlog');
    }

    public function images(){
        return $this->hasMany('App\EventImage');
    }
}
