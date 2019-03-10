<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postulation;

class PostulationController extends Controller
{
    //

    public function create(request $request)
    {
        $pos = new Postulation();

        $pos->email = $request->email;
        $pos->text = $request->text;
        $pos->name = $request->name;
        $pos->phone = $request->phone;
        $pos->site = $request->site;
        $pos->age = $request->age;
        $pos->instrument = $request->instrument;

        $pos->save();

        return;
    }

    public function getAll()
    {
        return Postulation::orderBy('created_at','desc')->get();
    }

     public function update(request $request){
        
        $postulation = Postulation::find($request->id);
        $field = $request->field;
        $postulation->$field = $request->value;
        $postulation->save();
        return;
    }

    public function destroy($id)
    {
        Postulation::destroy($id);
    }
}
