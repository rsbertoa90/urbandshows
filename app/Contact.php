<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded=[];


    public function city(){
        return $this->belongsTo(City::class);
    }

    public function set(){
        return $this->belongsTo(Set::class);
    }
}
