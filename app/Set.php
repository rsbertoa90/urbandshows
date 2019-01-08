<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Song;
use Event;

class Set extends Model
{
    //
        protected $guarded = [];

         public function setBase_priceAttribute($base_price)
        {
            $this->attributes['base_price'] = $base_price*100;
        }

        public function getBase_priceAttribute($base_price)
        {
            return $base_price / 100;
        }

        public function songs()
        {
            return $this->belongsToMany(Song::class);
        }

        public function events()
        {
            return $this->hasMany(Event::class);
        }


}
