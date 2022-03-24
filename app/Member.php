<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'club_id',
        'name',
        'contact',
        'email',
        'date_of_birth',
    ];

    public function club(){
        return $this->belongsTo('App\Club');
    }
}
