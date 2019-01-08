<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
class TagController extends Controller
{
    //

      public function update(Request $request)
    {
        $Tag = Tag::find($request->id);
        $field = $request->field;
        $Tag->$field = $request->value;

        $Tag->save();
    }

    public function getAll()
    {
        return Tag::all();
    }


    public function create(Request $request)
    {
        $fields = $request->except('_token');
        Tag::create($fields);
    }
}
