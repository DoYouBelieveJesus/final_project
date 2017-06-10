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
    return view('importfood');
});
Route::get('/import',function() {
    return view('importshop');
});
Route::post('/import/result' , 'ImportController@import'  );


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
