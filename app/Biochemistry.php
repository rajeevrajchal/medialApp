<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biochemistry extends Model
{
    protected $fillable =[
        'total_protein',
        'albumin',
        'sugar_f',
        'sugar_pp',
        'sugar_r',
        'patient_id',
    ];
}
