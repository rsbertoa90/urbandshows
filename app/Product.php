<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\ProductImage;


class Product extends Model
{
    //
        protected $guarded =[];

        public function categories()
        {
            return $this->belongsTo(Category::class);
        }

        public function images()
        {
            return $this->hasMany(ProductImage::class);
        }

      

        
}
