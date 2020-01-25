<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

include(__DIR__.'/auth/auth.php');
include(__DIR__.'/patients/patient.php');
include(__DIR__.'/lipid/lipid.php');
include(__DIR__.'/serology/serology.php');
include(__DIR__.'/urine/urine.php');
include(__DIR__.'/biochemistry/biochemistry.php');
include(__DIR__.'/hematology/hematology.php');
