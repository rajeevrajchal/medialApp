<?php
Route::group(['prefix' => 'urine'], function () {
    Route::get('/{patient}', 'UrineController@index');
    Route::post('', 'UrineController@store');
});
