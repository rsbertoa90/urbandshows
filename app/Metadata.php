<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
 protected $guarded=[];
 protected $table ='metadata';

 public static function findOrCreate($page)
 {
    $meta = Self::where('page',$page)->get()->first();

    if(!$meta)
    {
        $meta = Self::create(['page'=>$page]);
    }

    return $meta;
 }

 public static function getPage($page)
 {
      return Self::where('page',$page)->get()->first();
 }
}
