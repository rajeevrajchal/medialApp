<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serology extends Model
{
    protected $fillable = [
        'hiv',
        'hbsa',
        'hcv',
        'rh',
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
