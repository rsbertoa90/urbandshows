<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Set;
use Tag;
use Material;

class Song extends Model
{
    //
        protected $guarded = [];

        public function sets()
        {
            return $this->belongsToMany(Set::class);
        }

        public function tags()
        {
            return $this->belongsToMany(Tag::class);
        }

        public function materials()
        {
            return $this->hasMany(Material::class);
        }
}
