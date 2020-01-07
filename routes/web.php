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
Route::post('category/add', 'CategoryController@store');
Route::get('category', 'CategoryController@index');
Route::get('category/delete/{id}', 'CategoryController@delete');
Route::get('category/edit/{id}', 'CategoryController@edit');
Route::post('category/edit/{id}', 'CategoryController@update');
