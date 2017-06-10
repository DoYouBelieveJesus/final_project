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

Route::get('/', function () {
    return view('main');
});
/*Route::get('/shop',function() {
    return view('showshop');
});*/
Route::get('/shop','showshopcontroller@showshop');
Route::get('/aboutshop',function() {
    return view('shopinformation');
});
Route::get('/importshop',function() {
    return view('importshop');
});
Route::get('/importfood',function(){
    return view('importfood');
});
Route::post('/importshop/result' , 'ImportController@importshop'  );
Route::post('/importfood/result' , 'ImportController@importfood'  );


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
