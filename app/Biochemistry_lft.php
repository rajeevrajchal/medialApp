<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biochemistry_lft extends Model
{
    protected $fillable =[
        'bilirubin_total',
        'bilirubin_direct',
        'sgpt_alt',
        'sgpt_ast',
        'alkaline_phosphatase',
        'patient_id',
    ];
}
