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

// Blogs Route 
Route::get('/my/article', 'Blog\BlogController@index')->name('my.articles');
Route::get('/create/blog', 'Blog\BlogController@create');
Route::get('/blogs', 'Blog\BlogController@blog')->name('blogs');
Route::post('/store/blog', 'Blog\BlogController@store')->name('store.blog');
Route::get('/blog/details/{slug}', 'Blog\BlogController@details')->name('blog.details');
Route::post('/comment/{singleBlog}', 'Blog\CommentController@store')->name('comment.store');
Route::get('/delete/{id}', 'Blog\BlogController@deleteblog')->name('delete.blog');
Route::get('/edit/{id}', 'Blog\BlogController@editblog')->name('edit.blog');
Route::post('/update/{id}', 'Blog\BlogController@updateblog')->name('update.blog');

