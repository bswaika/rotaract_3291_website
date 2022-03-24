<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    //
    protected $fillable = [
        'name', 'zone_rep', 'zone_sec',
    ];

    public function clubs(){
        return $this->hasMany('App\Club');
    }
}
