<?php

use Illuminate\Http\Request;


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'Api\AuthController@login');
    Route::post('register', 'Api\AuthController@register');
    Route::group(['prefix' => 'reset'], function () {
        Route::post('create', 'Api\PasswordResetController@create');
        Route::get('find/{token}', 'Api\PasswordResetController@find');
        Route::post('reset', 'Api\PasswordResetController@reset');
    });
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'Api\AuthController@logout');
        Route::get('user','Api\AuthController@user' );
    });
});
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/main', 'Api\MovieController@index');
    Route::get('/banner', 'Api\MovieController@banner');
    Route::get('/category/{id}/movies', 'Api\MovieController@moviesInCategory');
    Route::get('/movie/{id}', 'Api\MovieController@movie');
    Route::get('/movie/{id}/related', 'Api\MovieController@relatedMovies');
    Route::put('/update/user','Api\AuthController@update_user' );

});
