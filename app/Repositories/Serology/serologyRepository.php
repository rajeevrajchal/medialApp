<?php

namespace App\Repositories\Serology;

use App\Patient;
use App\Serology;
use Illuminate\Http\Request;

interface serologyRepository{
    public function getSerology(Patient $patient);
    public function storeSerology(Request $request, Serology $serology);
}
