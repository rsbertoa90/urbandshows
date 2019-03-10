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

   
    Route::put('/metadata','MetadataController@update');
  
});


Route::middleware('CheckAdmin')->prefix('admin')->group(function(){

    Route::get('/','AdminController@admin');
  
    Route::post('/tags','TagController@create');
    
    Route::post('/set','SetController@create');
    Route::post('/set/image','SetController@updateImage')->middleware('OptimizeImages');;
    Route::put('/set','SetController@update');

    Route::post('/song','SongController@create');
    Route::put('/song','SongController@update');
    Route::post('/song/delete/{id}','SongController@destroy');

    Route::post('/contact','ContactController@create');
    Route::put('/contact','ContactController@update');
    Route::post('/contact/delete/{id}','ContactController@destroy');

    Route::post('/postulation','PostulationController@create');
    Route::put('/postulation','PostulationController@update');
    Route::post('/postulation/delete/{id}','PostulationController@destroy');
    
    
  


    Route::put('/config','ConfigController@update');

    Route::get('/pdf/{order}','OrderController@toPDF');
});

Route::get('/pdf/{order}','OrderController@toPDF');

Route::get('/config','ConfigController@get');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', function(){return redirect('/');});


Route::get('/contacto','HomeController@contacto');
Route::post('/contacto','ContactController@create');
Route::get('/buscar','ProductController@searchResults');
Route::get('/quienes-somos','HomeController@quienesSomos');
Route::get('/trabaja-con-nosotros','HomeController@trabajaConNosotros');
Route::post('/postulacion','PostulationController@create');

Route::get('/logout',function(){
    Auth::logout();
    return redirect('/');
});
Auth::routes();


Route::get('/getUser','HomeController@getUser');


/* ESTAS RUTAS SIEMPRE AL FINAL */


Route::post('/setform','ContactController@createFromSetForm');
Route::get('/{set}','SetController@detail');