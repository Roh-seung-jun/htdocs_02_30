<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;
    protected $guarded =[];
    protected $primaryKey = 'phone';
    protected $keyType = 'string';
}
