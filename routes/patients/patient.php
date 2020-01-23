<?php
Route::group(['prefix' => 'patient'], function () {
    Route::get('', 'PatientController@index');
    Route::post('', 'PatientController@store');
//    Route::post('/{patient}', 'PatientController@');
    Route::post('/{patient}','PatientController@update');
    Route::delete('/{patient}/delete', 'PatientController@destroy');

});
