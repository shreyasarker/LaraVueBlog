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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/{anypath}', 'HomeController@index')->where('path', '.*');

//Category
Route::post('categories/add', 'CategoryController@store');
Route::get('categories', 'CategoryController@index');
Route::get('categories/delete/{id}', 'CategoryController@delete');
Route::get('categories/edit/{id}', 'CategoryController@edit');
Route::post('categories/edit/{id}', 'CategoryController@update');

Route::get('blogposts', 'PostController@index');
Route::post('blogposts/add', 'PostController@store');
Route::get('blogposts/delete/{id}', 'PostController@delete');
Route::get('blogposts/edit/{id}', 'PostController@edit');
Route::post('blogposts/edit/{id}', 'PostController@update');
