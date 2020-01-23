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
        'lipid_flag'
    ];
}
