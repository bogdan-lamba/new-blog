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

Auth::routes();

Route::get('/', 'PostsController@index')->name('welcome');
Route::get('home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostsController');

Route::get('dashboard/posts', ['as' => 'posts.dashboard', 'uses' => 'PostsController@dashboard']);

Route::get('posts/tags/{tag}', 'TagController@index')->name('tags');

Route::post('posts/search', ['as' => 'posts.search', 'uses' => 'PostsController@search']);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController', ['except' => ['show']])->middleware('can:manage-users');
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
