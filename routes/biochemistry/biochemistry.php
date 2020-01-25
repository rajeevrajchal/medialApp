<?php
Route::group(['prefix' => 'biochemistry'], function () {
    Route::get('/{patient}', 'BiochemistyController@index');
    Route::post('', 'BiochemistyController@store');
});
