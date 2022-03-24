<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secretary extends Model
{
    //
    protected $fillable = [
        'club_id',
        'name',
        'contact',
        'email',
        'image',
    ];

    public function club(){
        return $this->belonsTo('App\Club');
    }
}
