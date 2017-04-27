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


Route::resource('user', 'UserController');

Route::resource('category', 'CategoryController');

Route::resource('book', 'BookController');

Route::resource('comment', 'CommentController');

Route::get('/home/index', ['as' => 'home.index', 'uses' => 'HomeController@index']);

Route::get('/home/detail/{id}', ['as' => 'home.detail', 'uses' => 'HomeController@detailBook']);

Route::post('/mark', ['as' => 'mark.store', 'uses' => 'MarkController@store']);
