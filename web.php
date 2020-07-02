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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')
->name('home');

// attractions show
Route::get('/attraction', 'AttractionController@show');
Route::get('/attraction/country/{id?}', 'AttractionController@city');
Route::get('/attraction/country/city/{country_id?}/{id?}', 'AttractionController@attraction');
Route::get('/attraction/description/{attraction_id}/{item_name}', 'AttractionController@description');
Route::get('/logout', 'AttractionController@logout');

// attractions: redact, delete, add.
Route::group([
  'middleware' => 'auth'
], function(){

    Route::post('/attraction/redact/add', 'AttractionController@add')
    ->name('add');

    Route::get('/attraction/redact/redact/{id}', 'AttractionController@redact');
    Route::get('/attraction/redact/delete/{id}', 'AttractionController@delete');
});


// Route::get('/index', function (){
//   return view('index.show');
// })
// ->name('index')->middleware('auth');

// admin
Route::group([
  'prefix'     => 'admin',
  'middleware' => ['web', 'auth'],
], function(){
    // admin
    Route::get('/', [
      'uses' => 'Admin\AdminController@show',
      'as'   => 'admin_index',
    ]);
    Route::get('/add/post', [
      'uses' => 'Admin\AdminPostController@create',
      'as'   => 'admin_add_posts',
    ]);
});

// альбомы (страны и города)
Route::get('/albums', 'AlbumsController@getList')
->name('albums');

// загрузка изображений
Route::get('image-upload', 'ImageUploadController@imageUpload')
->name('image.upload');
Route::post('image-upload', 'ImageUploadController@imageUploadPost')
->name('image.upload.post');

Route::get('/image/upl', 'ImageController@upload')
->name('image_upload');
