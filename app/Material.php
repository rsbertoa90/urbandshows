<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Song;

class Material extends Model
{
    //
    protected $guarded = [];

    public function song()
    {
        return $this->belongsTo(Song::class);
    }
}
