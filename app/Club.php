<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = [
        'zone_id',
        'name',
        'contact',
        'email',
        'shorthand',
        'website',
        'about',
        'logo',
        'established_in',
        'parent_rotary',
        'fb_link',
        'tw_link',
        'ins_link',
        'points',
        'visibility',
        'meet_venue',
        'meet_time',
    ];

    public function zone(){
        return $this->belongsTo('App\Zone');
    }

    public function events(){
        return $this->hasMany('App\Event');
    }

    public function members(){
        return $this->hasMany('App\Member');
    }

    public function president(){
        return $this->hasOne('App\President');
    }

    public function secretary(){
        return $this->hasOne('App\Secretary');
    }

    public function user(){
        return $this->hasOne('App\User');
    }
}
