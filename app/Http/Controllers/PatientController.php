<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Repositories\Patient\patientRepository;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function __construct(patientRepository $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    public function index(){
        try {

            $allPatient = $this->patientRepository->getAllPatient();
            return response()->json([
                'status' => 1,
                'data' => $allPatient
            ]);
        }catch (\Exception $e){
            throw $e;
        }
    }
    public function getPatient($patient){
        try {
            $patient = $this->patientRepository->getSinglePatient($patient);
            return response()->json([
                'status' => 1,
                'data' => $patient
            ]);
        } catch (\Exception $e){
            throw $e;
        }
    }

    public function getPatientReport($patient){
        try {
            $report = $this->patientRepository->generatePatientReport($patient);
            return response()->json([
                'status' => 1,
                'data' => $report
            ]);
        } catch (\Exception $e){
            throw $e;
        }
    }
    public function store(Request $request)
    {
        $storePatient = new Patient();
        $patient = $this->patientRepository->storeOrUpdatePatient($request,$storePatient);
        return response()->json([
            'status' => 1,
            'data' => $patient,
        ]);
    }

    public function update(Request $request, Patient $patient)
    {
        try{
            $patient = $this->patientRepository->storeOrUpdatePatient($request,$patient);
            return response()->json([
                'status' => 1,
                'data' => $patient
            ]);
        }catch (\Exception $e){
            throw $e;
        }
    }

    public function destroy(Patient $patient)
    {
        try {
            $patient = $this->patientRepository->destroyPatient($patient);
            return response()->json([
                'status' => 1,
                'data' => $patient
            ]);

        }catch (\Exception $e){
            throw  $e;
        }
    }
}
