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

    public function cotizer()
    {
        $meta = Metadata::getPage('cotizador');
        return view('cotizer',compact('meta'));
    }

    public function regalosEmpresariales(){
         $meta = Metadata::getPage('regalos empresariales');
        return view('regalos-empresariales',compact('meta'));
    }

    public function franquicia(){
         $meta = Metadata::getPage('franquicia');
        return view('franquicia',compact('meta'));
    }

    public function sucursales(){
         $meta = Metadata::getPage('sucursales');
        return view('sucursales',compact('meta'));
    }

    public function contacto(){
         $meta = Metadata::getPage('contacto');
        return view('contacto',compact('meta'));
    }

    public function slugHandler($slug)
    {
        dd($slug);
        $category = Category::where('slug','/'.$slug)->get()->first();
        if ($category){
           return CategoryController::detail($category);           
        }

        $product = Product::where('slug',$slug)->get()->first();
        if ($product){
           return ProductController::detail($product);           
        }

        return redirect('/');

        
    }

}
