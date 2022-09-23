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

Route::get('/', 'UserController@home')->name('home');
Route::get('/detail/{produk}', 'UserController@detail')->name('detail');
Route::get('/login', 'UserController@login')->name('login');
Route::post('/postlogin', 'UserController@postlogin')->name('postlogin');
Route::get('/register', 'UserController@register')->name('register');
Route::post('postregister', 'UserController@postregister')->name('postregister');


Route::middleware('auth')->group(function () {
    Route::get('/logout', 'UserController@logout')->name('logout');
    Route::post('/postkeranjang/{produk}', 'UserController@postkeranjang')->name('pelanggan.postkeranjang');
    Route::post('/updatekeranjang/{detailtransaksi}', 'UserController@updatekeranjang')->name('pelanggan.updatekeranjang');
    Route::get('/keranjang', 'UserController@keranjang')->name('keranjang');
    Route::get('/deletetkeranjang/{detailtransaksi}', 'UserController@deletekeranjang')->name('pelanggan.deletekeranjang');
    Route::get('/bayar/{detailtransaksi}', 'UserController@bayar')->name('bayar');
    Route::post('/prosesbayar/{detailtransaksi}', 'UserController@prosesbayar')->name('pelanggan.prosesbayar');
    Route::get('/summary', 'UserController@summary')->name('summary');

    Route::get('/admin/produk', 'AdminController@index')->name('admin.produk');
    // Route::get('/admin/tampilTambah', 'AdminController@tampiltambah')->name('admin.tampiltambah');
    Route::post('/admin/tambahProduk', 'AdminController@post')->name('admin.tambahproduk');
    Route::get('/admin/tampilEdit{produk}', 'AdminController@tampiledit')->name('admin.tampiledit');
    Route::post('/admin/tampilEdit{produk}', 'AdminController@update')->name('admin.updateproduk');
    Route::get('/admin/deleteProduk{produk}', 'AdminController@delete')->name('admin.deleteproduk');
});
