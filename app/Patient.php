<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name',
        'age',
        'address',
        'gender',
        'tn',
        'contact',
        'lipid_flag',
        'serology_flag',
        'urine_falg',
        'hematology_flag',
        'biochemistry_flag'
    ];
}
