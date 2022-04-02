<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    public $timestamps = false;
    protected $guarded = [];

    public function files(){
        return $this->hasMany('App\File');
    }
}
