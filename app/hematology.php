<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hematology extends Model
{
    protected $fillable =[
        'haemoglobin',
        'plateles',
        'bloodgroup',
        'malarialparasites',
        'hba1c',
        'patient_id',
    ];
}
