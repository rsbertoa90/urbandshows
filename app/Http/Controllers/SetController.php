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
        return Set::with('songs.material')->with('events.city')->get();
    }


    public function create(Request $request)
    {
        $fields = $request->except('_token');
        Set::create($fields);
    }

    
}
