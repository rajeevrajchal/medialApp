<?php
namespace App\Repositories\Patient;

use App\Enums\deleteStatus;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class patientService implements patientRepository {
    public function getAllPatient(){
        $patient = Patient::where('delete_flag',deleteStatus::ACTIVE)
            ->orderBy('created_at','desc')
            ->get()
            ->sortBy('isReport',0);
        return $patient;
    }
    public function getPatient(Patient $patient)
    {
        $patient = Patient::find($patient);
        return $patient;
    }

    public function generatePatientReport(Patient $patient)
    {

    }

    public function storeOrUpdatePatient(Request $request, Patient $patient)
    {
        try {
            $patient = Patient::create($request->all());
            return $patient;
        }catch(\Exception $e){
            throw $e;
        }

    }
    public function destroyPatient(Patient $patient)
    {
        try {
            $patient->delete_flag = deleteStatus::INACTIVE;
            $patient->save();
            return $patient;

        }catch (\Exception $e){
            throw  $e;
        }
    }
}
