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

Route::get('/', function() {
    return view('welcome');
});

Route::get('mhs','MhsController@index');
Route::get('mhs/tambah','MhsController@tambah');
Route::get('mhs/edit/{id}','MhsController@edit');
Route::get('mhs/delete/{id}','MhsController@delete');
Route::get('mhs/cari/','MhsController@cari');
Route::post('mhs/store','MhsController@store');
Route::put('mhs/edit/update/{id}','MhsController@update');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout','LoginController@logout');