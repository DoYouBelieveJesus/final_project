<?php
//use App\Http\Middleware\User;

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

Route::get('/searchresult',function() { return view('searchresult');});
Route::get('/', function () {
    return view('main');
});
/*Route::get('/shop',function() {
    return view('showshop');
});*/
Route::get('/shop','showshopcontroller@showshop');
Route::get('/aboutshop',function() {
    return view('foodinformation');
});
/*Route::get('/test',function() {
    return view('searchresult');
});*/
Route::get('/shop/{shop}/meal','showshopcontroller@showfood');
Route::get('/importshop',function() {
    return view('importshop');
});
Route::get('/importfood',function(){
    return view('importfood');
});
Route::get('/shop/{shop}','showshopcontroller@showshopdetial');

Route::post('/importshop/result' , 'ImportController@importshop' )->middleware('User');
Route::post('/importfood/result' , 'ImportController@importfood' )->middleware('User');
Route::post('/shop/comment/{shop}' , 'CommentController@upload_comment')->middleware('User');
Route::post('/shop/{shop}/food/{meal}/like/result','LikeController@foodlike')->middleware('User');
Route::post('/shop/{shop}/like/result','LikeController@shoplike')->middleware('User');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/search' , 'searchresult@show');
