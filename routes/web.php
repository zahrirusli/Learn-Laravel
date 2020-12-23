<?php

use App\dosen;

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
    return view('home');
});

Route::resource('mhs','MhsController');
Route::resource('dosen','DosenController');
Route::get('dosen/create', 'DosenController@create');
Route::get('dosen/listMhsWali/{nip}', 'DosenController@listMhsWali');
Route::get('caridosen', 'DosenController@search');
Route::get('viewdosen', 'DosenController@bootGrid');
Route::post('deletedosen', 'DosenController@del');
Route::post('savedosen', 'DosenController@save');

