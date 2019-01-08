<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;

class SongController extends Controller
{
    //

    public function update(Request $request)
    {
        $song = Song::find($request->id);
        $field = $request->field;
        $song->$field = $request->value;

        $song->save();
    }

    public function getAll()
    {
        return Song::with('materials')->with('tags')->with('sets')->get();
    }


    public function create(Request $request)
    {
        $fields = $request->except('_token');
        Song::create($fields);
    }
}
