<?php
namespace App\Repositories\Lipid;

use App\Lipid;
use App\Patient;
use Illuminate\Http\Request;

class lipidService implements lipidRepository{
    public function store(Request $request, Lipid $lipid)
    {
        try {
            $lipid = Lipid::create($request->all());
            return $lipid;
        }catch(\Exception $e){
            throw $e;
        }
    }
    public function getLipid(Patient $patient){
        $lipid = Lipid::all()
            ->where('patient_id','$patient')
            ->get();
    }
}
