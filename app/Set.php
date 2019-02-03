<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Song;

use App\Event;

class Set extends Model
{
    //
        protected $guarded = [];

         public function setBasePriceAttribute($base_price)
        {
            $this->attributes['base_price'] = $base_price*100;
        }

        public function getBasePriceAttribute($base_price)
        {
            return $base_price / 100;
        }

        public function songs()
        {
            return $this->hasMany(Song::class);
        }

        public function events()
        {
            return $this->hasMany(Event::class);
        }
        
        public function setTitleAttribute($title)
        {
            $slug = str_slug($title);
            $this->attributes['slug']=$slug;
            $this->attributes['title']=$title;
            $this->save();

        }

      

}
