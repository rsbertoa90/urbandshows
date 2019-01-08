<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Client;
use City;
use Set;


class Event extends Model
{
    //
        protected $guarded = [];

        public function client(){
            return $this->belongsTo(Client::class);
        }

        public function set()
        {
            return $this->belongsTo(Set::class);
        }

        public function city(){
            return $this->belongsTo(City::class);
        }

        public function getPriceAttribute($price)
        {
            return $price / 100;
        }

        public function setPriceAttribute($price)
        {
            $this->attributes['price'] = $price*100;
        }

        public function getPaydAttribute($payd)
        {
            return $payd / 100;
        }

        public function setPaydAttribute($payd)
        {
            $this->attributes['payd'] = $payd*100;
        }
}
