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

/* Route::get('/', function () {
    return view('welcome');
}); */
/* 
Route::get('/','App\Http\Controllers\HomeController@index')->name('index'); */

/* products */
Route::get('/','App\Http\Controllers\ProductController@index')->name('index');
//taking us to create page
Route::get('/add-product','App\Http\Controllers\ProductController@create');
//route that handles the storage to database
Route::post('/add-product','App\Http\Controllers\ProductController@store');
//handles editing product
Route::get('/edit-product/{product}','App\Http\Controllers\ProductController@edit');
//handles update
Route::put('/edit-product/{product}','App\Http\Controllers\ProductController@update');
//delete
Route::delete('/delete-product/{product}','App\Http\Controllers\ProductController@delete');
//search
Route::get('/search','App\Http\Controllers\ProductController@search');



/* category */
Route::get('/category','App\Http\Controllers\CategoryController@index')->name('index');
//taking us to create page
Route::get('/add-category','App\Http\Controllers\CategoryController@create');
//route that handles the storage to database
Route::post('/add-category','App\Http\Controllers\CategoryController@store');



Route::get('/home', function () {
    return view('home');
});

