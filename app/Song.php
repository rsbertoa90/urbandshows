<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Set;

use App\Material;

class Song extends Model
{
    //
        protected $guarded = [];

        public function set()
        {
            return $this->belongsTo(Set::class);
        }

      
        public function materials()
        {
            return $this->hasMany(Material::class);
        }
}
