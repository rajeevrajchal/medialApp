<?php
namespace App\Repositories\Patient;

use App\Patient;
use Illuminate\Http\Request;

interface patientRepository{
    public function getAllPatient();
    public function getSinglePatient(Patient $patient);
    public function storeOrUpdatePatient(Request $request, Patient $patient);
    public function generatePatientReport(Patient $patient);
    public function destroyPatient(Patient $patient);
}
