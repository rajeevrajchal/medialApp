<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class urine_chemical extends Model
{
    protected $fillable= [
        'ph',
        'albumin',
        'sugar',
        'patient_id'
    ];
}
