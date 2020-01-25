<?php
namespace App\Repositories\Urine;

use App\urine_chemical;
use App\urine_microscopic;
use App\urine_physical;
use Illuminate\Http\Request;

interface urineRepository{
    public function store(Request $request,
                          urine_physical $urine_physical,
                          urine_chemical $urine_chemical,
                          urine_microscopic $urine_microscopic);
}
