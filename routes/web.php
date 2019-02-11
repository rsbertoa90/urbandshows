<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::middleware('CheckSuper')->prefix('super')->group(function(){
    Route::get('/', 'SuperController@panel');

    Route::post('/category/image','CategoryController@uploadImage')->middleware('OptimizeImages');

    Route::put('/metadata','MetadataController@update');
    Route::get('/products','AdminController@tableView');
});


Route::middleware('CheckAdmin')->prefix('admin')->group(function(){

    Route::get('/','AdminController@admin');
    Route::get('/cotizador','AdminController@cotizador');

    Route::post('/tags','TagController@create');
    
    Route::post('/set','SetController@create');
    Route::post('/set/image','SetController@updateImage');
    Route::put('/set','SetController@update');

    Route::post('/song','SongController@create');
    Route::put('/song','SongController@update');
    Route::post('/song/delete/{id}','SongController@destroy');

    Route::post('/contact','ContactController@create');
    Route::put('/contact','ContactController@update');
    Route::post('/contact/delete/{id}','ContactController@destroy');
    
    Route::post('/product/image','ProductImageController@create')->middleware('OptimizeImages');
   


    Route::put('/config','ConfigController@update');

    Route::get('/pdf/{order}','OrderController@toPDF');
});

Route::get('/pdf/{order}','OrderController@toPDF');

Route::get('/config','ConfigController@get');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', function(){return redirect('/');});

Route::get('/cotizador','HomeController@cotizer');
Route::get('/regalos-empresariales','HomeController@regalosEmpresariales');
Route::post('/regalos-empresariales','MailController@regalosEmpresariales')->middleware('OptimizeImages');;
Route::get('/franquicia','HomeController@franquicia');
Route::post('/franquicia','MailController@franquicia');
Route::get('/sucursales','HomeController@sucursales');
Route::get('/contacto','HomeController@contacto');
Route::post('/contacto','ContactController@create');
Route::get('/buscar','ProductController@searchResults');

Route::get('/logout',function(){
    Auth::logout();
    return redirect('/');
});
Auth::routes();


Route::get('/getUser','HomeController@getUser');

Route::post('/cotizer/send','OrderController@create');

Route::get('/lista-de-precios','PdfController@prices');

Route::post('/suscription','SuscriptionController@create');

/* ESTAS RUTAS SIEMPRE AL FINAL */


Route::post('/setform','ContactController@createFromSetForm');
Route::get('/{set}','SetController@detail');