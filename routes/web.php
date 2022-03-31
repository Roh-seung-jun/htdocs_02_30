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
});

Route::get('/admin','EventController@admin');
Route::post('/admin','EventController@login')->name('admin');
Route::get('/event','EventController@index')->name('event');
Route::post('/api/event/applicants','EventController@make');
Route::post('/api/reviews','ReviewController@make');
Route::get('/api/reviews','ReviewController@join');
Route::post('/load','ReviewController@load');
Route::post('/view','ReviewController@view');
Route::get('/review','ReviewController@index')->name('review');
Route::get('/map','MapController@index')->name('map');
Route::get('/mapSet','MapController@set')->name('mset');
Route::get('/eventSet','EventController@set')->name('eset');
Route::get('/api/event/{phone}/stamps','EventController@join');
