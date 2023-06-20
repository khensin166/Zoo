<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\MobilController@index');
Route::get('/tambahMobil', 'App\Http\Controllers\MobilController@create');
Route::post('/tambahMobil', 'App\Http\Controllers\MobilController@store');
Route::post('/hapusMobil/{mobilId}', 'App\Http\Controllers\MobilController@destroy');
Route::get('/editMobil/{mobilId}', 'App\Http\Controllers\MobilController@edit');
Route::post('/updateMobile/{mobilId}', 'App\Http\Controllers\MobilController@update');