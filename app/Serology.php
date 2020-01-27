<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serology extends Model
{
    protected $fillable = [
        'hiv',
        'hbsa',
        'hcv',
        'ra',
        'crd',
        'aso',
        'widal',
        'vdrl',
        'tpha',
        'upt',
        'hpylori',
        'fob',
        'patient_id'
    ];
}
