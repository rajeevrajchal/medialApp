<?php

Route::group(['prefix' => 'serology'], function () {
    Route::get('/{patient}', 'SerologyController@index');
    Route::post('', 'SerologyController@store');
});
