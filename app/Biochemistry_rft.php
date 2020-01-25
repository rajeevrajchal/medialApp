<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biochemistry_rft extends Model
{
    protected $fillable = [
        'urea',
        'creatinine',
        'sodium',
        'potassium',
        'patient_id',
    ];
}
