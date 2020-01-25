<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class urine_microscopic extends Model
{
    protected $fillable = [
        'cast',
        'crystal',
        'puscells',
        'sec',
        'erythrocytes',
        'yeast',
        'calciumxalate',
        'others',
        'patient_id'
    ];
}
