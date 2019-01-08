<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;
class MaterialController extends Controller
{
    //

      public function update(Request $request)
    {
        $Material = Material::find($request->id);
        $field = $request->field;
        $Material->$field = $request->value;

        $Material->save();
    }


    public function create(Request $request)
    {
        $fields = $request->except('_token');
        Material::create($fields);
    }
}
