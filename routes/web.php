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
Route::get('/admin','SetController@admin')->name('admin');
Route::get('/logout','SetController@logout')->name('logout');
Route::get('/mset','SetController@mset')->name('mset');
Route::get('/eset','SetController@eset')->name('eset');
Route::get('/api/event/{phone}/reviews','ApiController@phone');
Route::get('/api/reviews','ApiController@review');
Route::get('/api/reviews/{id}','ApiController@view');

Route::post('/event','EventController@submit');
Route::post('/api/event/applicants','ApiController@eventPost');
Route::post('/api/reviews','ApiController@reviewPost');
Route::post('/review','ReviewController@submit');
Route::post('/load','ReviewController@load');
Route::post('/show','ReviewController@show');
Route::post('/login','SetController@login')->name('login');
Route::post('/setMap','SetController@setMap')->name('setMap');
