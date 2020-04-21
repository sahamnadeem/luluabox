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

Route::get('/', 'Auth\LoginController@getLogin');

Auth::routes(['verify' => true, 'register' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['role:admin', 'auth']], function() {
    Route::get('/logout', 'LoginController@logout')->name('custom.logout');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('users', 'UserController');
    Route::post('users/restore/{id}', 'UserController@restore')->name('users.Srestore');
    Route::delete('users/deletePermanently/{id}', 'UserController@deletePermanently')->name('users.permanent.delete');

    Route::resource('roles', 'RoleController');
    Route::post('roles/restore/{id}', 'RoleController@restore')->name('roles.restore');
    Route::delete('roles/deletePermanently/{id}', 'RoleController@deletePermanently')->name('roles.permanent.delete');

    Route::resource('status', 'StatusController');
    Route::post('status/restore/{id}', 'StatusController@restore')->name('status.restore');
    Route::delete('status/deletePermanently/{id}', 'StatusController@deletePermanently')->name('status.permanent.delete');

    Route::resource('categories', 'CategoryController');
    Route::post('categories/restore/{id}', 'CategoryController@restore')->name('categories.restore');
    Route::delete('categories/deletePermanently/{id}', 'CategoryController@deletePermanently')->name('categories.permanent.delete');

    Route::resource('genres', 'GenreController');
    Route::post('genres/restore/{id}', 'GenreController@restore')->name('genres.restore');
    Route::delete('genres/deletePermanently/{id}', 'GenreController@deletePermanently')->name('genres.permanent.delete');

    Route::resource('status', 'StatusController');
    Route::post('status/restore/{id}', 'StatusController@restore')->name('status.restore');
    Route::delete('status/deletePermanently/{id}', 'StatusController@deletePermanently')->name('status.permanent.delete');

    Route::resource('tags', 'TagController');
    Route::post('tags/restore/{id}', 'TagController@restore')->name('tags.restore');
    Route::delete('tags/deletePermanently/{id}', 'TagController@deletePermanently')->name('tags.permanent.delete');

    Route::resource('movies', 'MovieController');
    Route::post('movies/restore/{id}', 'MovieController@restore')->name('movies.restore');
    Route::delete('movies/deletePermanently/{id}', 'MovieController@deletePermanently')->name('movies.permanent.delete');

    Route::resource('banners', 'BannerController');
    Route::post('banners/restore/{id}', 'BannerController@restore')->name('banners.restore');
    Route::delete('banners/deletePermanently/{id}', 'BannerController@deletePermanently')->name('banners.permanent.delete');

    Route::post('movies/upload','MovieController@uplaod')->name('movies.upload');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/logout', 'Auth\LoginController@logout');
});
