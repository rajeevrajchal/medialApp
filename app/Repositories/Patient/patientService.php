<?php
namespace App\Repositories\Patient;

use App\Biochemistry;
use App\Biochemistry_lft;
use App\Biochemistry_rft;
use App\Enums\deleteStatus;
use App\hemato_cbc;
use App\hemato_dlc;
use App\hematology;
use App\Lipid;
use App\Patient;
use App\Serology;
use App\urine_chemical;
use App\urine_microscopic;
use App\urine_physical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;


class patientService implements patientRepository {
    public function getAllPatient(){
        $patient = Patient::where('delete_flag',deleteStatus::ACTIVE)
            ->orderBy('created_at','desc')
            ->get()
            ->sortBy('isReport',0);
        return $patient;
    }
    public function getSinglePatient($patient)
    {
        $patient = Patient::find($patient);
        return $patient;
    }

    public function generatePatientReport($patient)
    {

        $data['patient'] = DB::table('patients')->where('patients.id','=', $patient)->get();
        $data['lipid'] = DB::table('lipids')->where('lipids.patient_id', '=',$patient)->get();
        $data['serology'] = DB::table('serologies')->where('serologies.patient_id', '=',$patient)->get();
        $data['urine_physical'] = DB::table('urine_physicals')->where('urine_physicals.patient_id', '=',$patient)->get();
        $data['urine_chemical'] = DB::table('urine_chemicals')->where('urine_chemicals.patient_id', '=',$patient)->get();
        $data['urine_microscopics'] = DB::table('urine_microscopics')->where('urine_microscopics.patient_id', '=',$patient)->get();
        $data['hematology'] = DB::table('hematologies')->where('hematologies.patient_id', '=',$patient)->get();
        $data['hematology_dlc'] = DB::table('hemato_dlcs')->where('hemato_dlcs.patient_id', '=',$patient)->get();
        $data['hematology_cbc'] = DB::table('hemato_cbcs')->where('hemato_cbcs.patient_id', '=',$patient)->get();
        $data['biochemistry'] = DB::table('biochemistries')->where('biochemistries.patient_id', '=',$patient)->get();
        $data['biochemistry_rft'] = DB::table('biochemistry_rfts')->where('biochemistry_rfts.patient_id', '=',$patient)->get();
        $data['biochemistry_lft'] = DB::table('biochemistry_lfts')->where('biochemistry_lfts.patient_id', '=',$patient)->get();
        return $data;
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
