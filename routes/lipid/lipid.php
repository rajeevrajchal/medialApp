<?php
Route::group(['prefix' => 'lipid'], function () {
    Route::get('/{patient}', 'LipidController@index');
    Route::post('', 'LipidController@store');
});
