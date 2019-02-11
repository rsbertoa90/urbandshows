<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\City;

class StateController extends Controller
{
    //

    public function get()
    {
        return State::where('id',1)->orWhere('id',2)->with('cities')->get(); 
    }

    public function getCity($id)
    {
        return City::with('state')->find($id);
    }
}
