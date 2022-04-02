<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    public $timestamps = false;
    protected $guarded = [];
    protected $keyType = 'string';
    protected $primaryKey = 'phone';
}
