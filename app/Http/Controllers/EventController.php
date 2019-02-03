<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    //

      public function update(Request $request)
    {
        $event = Event::find($request->id);
        $field = $request->field;
        $event->$field = $request->value;

        $event->save();
    }

    public function getAll()
    {
        return Event::with('city')->with('client')->with('set')->get();
    }

    


    public function create(Request $request)
    {
        $fields = $request->except('_token');
        Event::create($fields);
    }
}
