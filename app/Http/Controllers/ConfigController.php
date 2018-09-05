<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Config;
use Auth;

class ConfigController extends Controller
{
    public function get()
    {
        return Config::find(1);
    }

    public function update(Request $request)
    {
        $user =  Auth::user();
        $field = $request->field;
        $config = Config::find(1);
        $config->$field = $request->value;

        $config->user_id = $user->id;
        $config->save();
    }
}
