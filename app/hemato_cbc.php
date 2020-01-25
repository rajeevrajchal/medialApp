<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hemato_cbc extends Model
{
    protected $fillable = [
        'totalbc',
        'patient_id'
    ];
}
