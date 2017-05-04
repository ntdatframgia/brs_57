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

Route::resource('request', 'RequestBookController');

Route::resource('user', 'UserController');

Route::get('pagenotfound', ['as' => 'notfound', 'uses' => 'HomeController@pageNotFound']);

Route::get('/category/deleted', ['as' => 'category.deleted', 'uses' => 'CategoryController@getdDeleted']);

route::get('category/restore/{id}', ['as' => 'category.restore', 'uses' => 'CategoryController@restore']);

Route::resource('category', 'CategoryController');

Route::resource('book', 'BookController');

Route::resource('comment', 'CommentController');

Route::get('/home/index', ['as' => 'home.index', 'uses' => 'HomeController@index']);

Route::get('/home/detail/{id}', ['as' => 'home.detail', 'uses' => 'HomeController@detailBook']);

Route::post('/mark', ['as' => 'mark.store', 'uses' => 'MarkController@store']);

Route::get('/home/profile/{id}/{slug?}', ['as' => 'home.profile', 'uses' => 'HomeController@profile']);

Route::post('/follow', ['as' => 'follow.store', 'uses' => 'FollowController@store']);

Route::get('mark/reading/{id}', ['as' => 'home.readding', 'uses' => 'HomeController@readding']);

Route::get('mark/deletereadding/{id}', ['as' => 'home.delete', 'uses' => 'MarkController@deleteReadding']);

Route::get('search', ['as' => 'home.search', 'uses' => 'HomeController@search']);
