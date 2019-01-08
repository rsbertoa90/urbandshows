<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\State;
use App\Event;

class City extends Model
{
    //
     protected $guarded =[];
     protected $table = 'cities';

     public function state()
     {
         return $this->belongsTo(State::class);
     }

     public function events()
     {
         return $this->hasMany(Event::class);
     }
}
