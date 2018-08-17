<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
    //
    protected $guarded =[];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function getImageAttribute($val){
        if (!$val){
            return '/storage/images/app/no-image.png';
        };
        return $val;
    }
}

