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

Route::post('/propane', 'PropaneController@postData')->name('propane.post');

Route::group(['middleware'=>'auth'], function() {
    Route::get('/users/{id}', function($id) {
        return $id;
    });
});

Route::get('/users', 'UsersController@usersListing');

Route::get('/propane', 'PropaneController@getAllPosts');
Route::get('/test', 'PropaneController@test');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/posts', 'PostsController');
