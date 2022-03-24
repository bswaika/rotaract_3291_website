<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SsParticipant extends Model
{
    //
    protected $fillable = [
        'name', 'club', 'zone', 'contact', 'pay', 'food',
    ];

    public $timestamps = false;
}
