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
    return view('index');
})->name('/');

Route::get('/event','EventController@index')->name('event');
Route::get('/map','MapController@index')->name('map');
Route::get('/review','ReviewController@index')->name('review');

Route::post('/event','EventController@submit');
Route::post('/review','ReviewController@submit');
Route::post('/load','ReviewController@load');
Route::post('/show','ReviewController@show');
