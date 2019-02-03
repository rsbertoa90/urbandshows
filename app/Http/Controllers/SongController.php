<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use App\Set;

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
        return Song::with('materials')->with('set')->orderBy('order','asc')->get();
    }


    public function create(Request $request)
    {
        $fields = $request->except('_token');
        $set = Set::find($request->set_id);
        $order = count($set->songs)+1;
        $fields['order'] = $order;
        $song = Song::create($fields);
       
    }

    public function destroy($id)
    {
        Song::destroy($id);
    }
}
