<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class urine_physical extends Model
{
    protected  $fillable =[
        'color',
        'transparency',
        'patient_id'
    ];
}
