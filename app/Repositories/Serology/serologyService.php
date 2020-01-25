<?php
namespace App\Repositories\Serology;

use App\Patient;
use App\Serology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class serologyService implements serologyRepository{
    public function getSerology(Patient $patient){
        $serology = Serology::all()
            ->where('patient_id','$patient')
            ->get();
        return $serology;
    }
    public function storeSerology(Request $request, Serology $serology)
    {
        try {
            $serology = Serology::create($request->all());
            return $serology;
        }catch(\Exception $e){
            throw $e;
        }
    }

}
