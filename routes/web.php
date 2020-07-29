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

Route::get('/', function () {
    return view('welcome');
});

Route::get('c1909g', function () {
  return view('c1909g');
});

Route::get('/home' , 'HomeController@index')->name('home');

Route::get('/about', 'HomeController@index')->name('about');

Route::get('/dang_ky', 'AccountController@dang_ky')->name('dang_ky');

Route::post('/dang_ky','AccountController@create')->name('dang_ky');






Route::get('/danh_muc','CategoryController@cate')->name('danh_muc');


Route::get('/create_danh_muc','CategoryController@add')->name('create_danh_muc');



Route::post('/create_danh_muc','CategoryController@create');


// Sửa danh mục

Route::get('update_cate/{id}','CategoryController@edit')->name('update_cate');

Route::post('update_cate/{id}','CategoryController@update');

// Xóa Danh Mục

Route::get('/delete/{id}','CategoryController@delete')->name('delete');

// Thêm Sản PHẩm

// Route::get('/product','ProductsController@index')->name('product');

// Route::get('/create_product','ProductsController@add')->name('create_product');

// Route::post('/create_product','ProductsController@create');




// Route::group(['prefix' => 'admin','namespace' => 'admin'] , function() {
// 	Route::get('/','AdminController@index')->name('index')
// });


