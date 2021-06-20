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
Route::post('register', 'Login\RegisterController@register');

Route::group(['middleware' => ['auth']],function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/fetchComments/{id}', 'HomeController@fetchComment');
    Route::post('/like/{id}', 'HomeController@createLike');
    Route::get('/get-post-like/{id}', 'HomeController@getPostLike');
    Route::post('/dislike/{id}', 'HomeController@createDislike');
    Route::get('/get-post-dislike/{id}', 'HomeController@getPostDislike');
    Route::post('create-comment', 'HomeController@createComment');
    Route::post('create-new-post', 'HomeController@createPost');

    Route::get('/timeline', 'HomeController@viewProfile');
    Route::get('profile/about', 'HomeController@viewProfileAbout');
    Route::get('people-you-may-know', 'Friends\FriendsController@viewFriendPage');
    Route::get('search-friends/{id}', 'Friends\FriendsController@findFriends');
    Route::post('change-profile-pic', 'Friends\FriendsController@changeProfilePic');

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

    // Album Routes
    Route::get('album', 'Album\AlbumController@showAlbum');
    Route::get('videos', 'Album\AlbumController@showVideoAlbum');

    // Sidebar footer routes 
    Route::get('/about', 'sidebar\SidebarFooterController@about');
    Route::get('/privacy', 'sidebar\SidebarFooterController@privacy');
    Route::get('/terms', 'sidebar\SidebarFooterController@terms');

    // Wallet section start
    Route::get('/wallet/show', 'Wallet\WalletController@showWallet');
});
