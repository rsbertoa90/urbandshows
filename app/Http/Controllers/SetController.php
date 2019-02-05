<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Set;

class SetController extends Controller
{
    //

      public function update(Request $request)
    {
        $Set = Set::find($request->id);
        $field = $request->field;
        $Set->$field = $request->value;

        $Set->save();
    }

    public function getAll()
    {
         return Set::with('songs.materials')->with(['songs' => function ($q){
             $q->orderBy('order');
         }])->with('events.city')->get();
        
    }


    public function create(Request $request)
    {
        
      $set = new Set();
      $set->title = $request->title;
      $set->description = $request->description;
      $set->save();
      return $set;
    }

    public function updateImage(Request $request)
    {
        
        $image = $request->file('image');
        $path = $image->storePublicly('/images/sets');
        $path = '/storage/'.$path;
        
        $set = Set::find($request->set);
        $set->image = $path;
        $set->save();
        

    }

    public function detail($slug)
    {
        $set = Set::where('slug',$slug)->get()->first();
        

        if(!$set){
            return redirect('/home');
        }

        else{
            return view('set',compact('set'));
        }
    }

    
}
