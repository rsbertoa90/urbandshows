<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Metadata;
use App\Product;
use App\Category;
use App\User;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    


     public function index()
    {
        $meta = Metadata::getPage('home');
        return view('home',compact('meta'));
    }


    public function getUser()
    {
        if(Auth::check())
        {
            return Auth::user();
        }
        else{
            $user = new User(['name'=>'guest',
                              'email'=>'guest@guest.com']);
            $user->role_id = 3;
            return $user;
        } 
            
    }

    public function contacto(){
         $meta = Metadata::getPage('contacto');
        return view('contacto',compact('meta'));
    }

    public function quienesSomos(){
          $meta = Metadata::getPage('quienes-somos');
        return view('quienes-somos',compact('meta'));
    }

    public function trabajaConNosotros(){
          $meta = Metadata::getPage('trabaja-con-nosotros');
        return view('trabaja-con-nosotros',compact('meta'));
    }

}
