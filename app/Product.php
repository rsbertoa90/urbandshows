<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\ProductImage;


class Product extends Model
{
    //
        protected $guarded =[];

        public function category()
        {
            return $this->belongsTo(Category::class);
        }

        public function images()
        {
            return $this->hasMany(ProductImage::class);
        }

      public static function boot()
    {
         parent::boot();

          self::creating(function($product){
            $product->attributes['slug'] = $product->category->slug.'/'.str_slug($product->name); 
          });
    }

    public function getPriceAttribute($val)
    {
        return $val/100;
    }

    public function setPriceAttribute($val)
    {
        $this->attributes['price']= $val*100;
    }

    public function getSlugAttribute($val)
    {
        if (!$val)
        {
            $val =  $this->category->slug.'/'.str_slug($this->name);
            $this->attributes['slug'] = $val;
            $this->save();
        }
        return $val;
    }

    public function getNameAttribute($name)
    {
        return ucfirst($name);
    }

      

        
}
