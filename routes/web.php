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
});

// Blogs Route 
Route::get('/my/article', 'Blog\BlogController@index')->name('my.articles');
Route::get('/create/blog', 'Blog\BlogController@create');
Route::get('/blogs', 'Blog\BlogController@blog')->name('blogs');
