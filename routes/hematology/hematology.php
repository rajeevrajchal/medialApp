<?php
Route::group(['prefix' => 'hematology'], function () {
    Route::get('/{patient}', 'HematologyController@index');
    Route::post('', 'HematologyController@store');
});
