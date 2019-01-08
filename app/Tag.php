<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Song;

class Tag extends Model
{
    //
        protected $guarded = [];
        

        public function songs()
        {
            return $this->belongsToMany(Song::class);
        }
}
