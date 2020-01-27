<?php

namespace App\Http\Controllers;

use App\Biochemistry;
use App\Biochemistry_lft;
use App\Biochemistry_rft;
use App\Patient;
use App\Repositories\Biochemistry\biochemistryRepository;
use Illuminate\Http\Request;

class BiochemistyController extends Controller
{
    public function __construct(biochemistryRepository $biochemistryRepository)
    {
        $this->biochemistryRepository = $biochemistryRepository;
    }

    public function  store(Request $request){
        try{
            $biochemistry_rft    = new Biochemistry_rft();
            $biochemistry_lft    =  new Biochemistry_lft();
            $biochemi       =   new Biochemistry();
            $patient = Patient::find($request->get(0)['patient_id']);
            $patient->biochemistry_flag = true;
            $patient->isReport = true;
            $patient->update();

            $biochemistry = $this->biochemistryRepository->store($request, $biochemi, $biochemistry_lft,$biochemistry_rft );
            return response()->json([
                'status' => 1,
                'data' => $biochemistry,
            ]);
        }catch (\Exception $e){
            throw $e;
        };
    }
}
