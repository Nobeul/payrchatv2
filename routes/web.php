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
Route::post('/store/blog', 'Blog\BlogController@store')->name('store.blog');
Route::get('/blog/details/{slug}', 'Blog\BlogController@details')->name('blog.details');
Route::post('/comment/{singleBlog}', 'Blog\CommentController@store')->name('comment.store');
Route::post('/like/{singleBlog}', 'Blog\BlogController@likeblog')->name('like.blog');

