<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;


class ContactController extends Controller
{
    
    public function getall(){
        return Contact::orderBy('created_at','desc')->get();
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

    public function update(request $request){
        
        $contact = Contact::find($request->id);
        $field = $request->field;
        $contact->$field = $request->value;
        $contact->save();
        return;
    }

    public function destroy($id)
    {
        Contact::destroy($id);
    }
}
