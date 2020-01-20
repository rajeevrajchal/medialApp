<?php
Route::group(['prefix' => '/'], function () {
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('register', 'AuthController@register');
});
Route::group([], function () {
    Route::get('logout', 'AuthController@logout')->name('logout');
});
