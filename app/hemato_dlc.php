<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hemato_dlc extends Model
{
    protected $fillable =[
        'neurophils',
        'lymphocytes',
        'monocytes',
        'eosinophils',
        'basophis',
        'patient_id',
    ];
}
