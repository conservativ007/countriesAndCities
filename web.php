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

  // attractions)
  Route::get('/attraction', 'AttractionController@show');
  Route::get('/attraction/country/{id?}', 'AttractionController@city');
  Route::get('/attraction/country/city/{id?}', 'AttractionController@attraction');
  Route::get('/attraction/description/{attraction_id}/{item_name}', 'AttractionController@description');
  Route::get('/attraction/add', 'AttractionController@add');
  Route::get('/attraction/redact/{id}', 'AttractionController@redact');
  Route::get('/attraction/delete/{id}', 'AttractionController@delete');
