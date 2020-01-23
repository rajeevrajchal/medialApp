<?php
namespace App\Repositories\Lipid;

use App\Lipid;
use App\Patient;
use Illuminate\Http\Request;

interface lipidRepository{
    public function getLipid(Patient $patient);
    public function store(Request $request, Lipid $lipid);
}
