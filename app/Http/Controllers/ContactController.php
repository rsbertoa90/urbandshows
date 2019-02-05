<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;


class ContactController extends Controller
{
    
    public function getall(){
        return Contact::all();
    }

    public function create(request $request){
        Contact::create([
            'message'=>$request->message,
            'phone'=>$request->phone,
            'mail'=>$request->mail,
            'name'=>$request->name
        ]);

        return redirect('/');
    }
}
