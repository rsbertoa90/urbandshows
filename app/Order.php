<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderItem;
use App\User;

class Order extends Model
{
    protected $guarded =[];
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

      public function getTotalAttribute($val)
    {
        return $val/100;
    }

    public function setTotalAttribute($val)
    {
        $this->attributes['total']= $val*100;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
