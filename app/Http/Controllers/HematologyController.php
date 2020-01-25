<?php

namespace App\Http\Controllers;

use App\hemato_cbc;
use App\hemato_dlc;
use App\hematology;
use App\Patient;
use App\Repositories\Hematology\hematologyRepository;
use Illuminate\Http\Request;

class HematologyController extends Controller
{
    public function __construct(hematologyRepository $hematologyRepository)
    {
        $this->hematologyRepository = $hematologyRepository;
    }

    public function  store(Request $request){
        try{
            $hema_cbc = new hemato_cbc();
            $hema_dlc = new hemato_dlc();
            $hema     = new hematology();
            $patient = Patient::find($request->get(0)['patient_id']);
            $patient->hematology_flag = true;
            $patient->isReport = true;
            $patient->update();

            $hematology = $this->hematologyRepository->store($request, $hema,$hema_cbc,$hema_dlc );
            return response()->json([
                'status' => 1,
                'data' => $hematology,
            ]);
        }catch (\Exception $e){
            throw $e;
        };
   }
}
