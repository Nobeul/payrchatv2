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

Auth::routes();

Route::group(['middleware' => ['verified']],function(){
    Route::get('/', 'HomeController@index');
    Route::get('/fetchComments/{id}', 'HomeController@fetchComment');
    Route::post('/like/{id}', 'HomeController@createLike');
    Route::get('/get-post-like/{id}', 'HomeController@getPostLike');
    Route::post('/dislike/{id}', 'HomeController@createDislike');
    Route::get('/get-post-dislike/{id}', 'HomeController@getPostDislike');
});
