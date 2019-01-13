<?php
use Illuminate\Http\Request;
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
//Route::resource('/post','PostController');
Route::post('/post/best', 'PostController@best');
Route::post('/post/status', 'PostController@status')->middleware('auth');
Route::post('/post/all', 'PostController@all');
Route::post('/post/store', 'PostController@store')->middleware('auth');;
Route::get('/user/{id}', 'PostController@index');
Route::get('/', function () {
    return view('welcome');
});
Route::post('/auth', function (Request $request){
    if(Auth::check()){
        return 'true';
    }
    return 'false';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
