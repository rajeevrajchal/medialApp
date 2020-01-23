<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lipid extends Model
{
    protected $fillable = [
        'totalcholesterol',
        'triglyceride',
        'hdl',
        'ldl',
        'vldl',
        'calcium',
        'vitaminD',
        'vitaminB12',
        'uric',
        'patient_id',
    ];
}
