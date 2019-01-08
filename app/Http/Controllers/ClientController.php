<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;


class ClientController extends Controller
{
    //
      public function update(Request $request)
    {
        $client = Client::find($request->id);
        $field = $request->field;
        $client->$field = $request->value;

        $client->save();
    }

    public function get($id){
        return Client::with('events')->with('user')->find($id);
    }

    public function create(Request $request)
    {
        $fields = $request->except('_token');
        Client::create($fields);
    }

    
}
