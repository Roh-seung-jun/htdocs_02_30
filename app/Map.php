<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    public $timestamps = false;
    protected $guarded =[];
    protected $keyType = 'string';
    //
    public function items(){
        return $this->hasMany('App\Item');
    }
}
