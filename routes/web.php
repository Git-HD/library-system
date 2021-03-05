<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index');

Route::get('/main', 'App\Http\Controllers\MainController@show');
Route::get('/create',"App\Http\Controllers\MainController@create");
Route::post('/store',"App\Http\Controllers\MainController@store") ;
Route::get('/edit/{id}',"App\Http\Controllers\MainController@edit") ;
Route::post('/update/{id}',"App\Http\Controllers\MainController@update") ;
Route::delete('/delete/{id}', 'App\Http\Controllers\MainController@delete');

Route::get('/category', 'App\Http\Controllers\HomeController@category');
Route::post('/addCategory',"App\Http\Controllers\HomeController@addCategory");

Route::get('/editora', 'App\Http\Controllers\HomeController@editora');
Route::post('/addEditora',"App\Http\Controllers\HomeController@addEditora");
