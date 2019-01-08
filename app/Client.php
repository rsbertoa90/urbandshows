<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;
use User;

class Client extends Model
{
    //
    protected $guarded = [];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
