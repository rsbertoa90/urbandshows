<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductImage;


class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $image = $request->file('image');
        $path = $image->storePublicly('/images/products');
        $path = '/storage/'.$path;
        $new = ProductImage::create([
                'product_id' => $request->product,
                'url' => $path,
                'order'=>2]);

        return $new;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

   public function update(Request $request)
    {
      
        $field = $request->field;
        $image = ProductImage::find($request->id);
        $image->$field = $request->value;
        $image->save();

        return $request->value;
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductImage::destroy($id);
    }
}
