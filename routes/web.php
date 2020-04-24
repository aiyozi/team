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
    return view('welcome');
});
Route::prefix("/friendship")->middleware("islogin")->group(function(){
    Route::get("create","Admin\FriendshipController@create");
    Route::post("store","Admin\FriendshipController@store");
    Route::get("/","Admin\FriendshipController@index");
    Route::get("show/{id}","Admin\FriendshipController@show");
    Route::get("edit/{id}","Admin\FriendshipController@edit");
    Route::post("update/{id}","Admin\FriendshipController@update");
  
   
});
Route::prefix("/login")->group(function(){
    Route::get("create","Admin\LoginController@create");
    Route::post("store","Admin\LoginController@store");
    Route::post("ajax","Admin\LoginController@ajax");
   
});