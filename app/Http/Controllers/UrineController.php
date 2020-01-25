<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Repositories\Urine\urineRepository;
use App\urine_chemical;
use App\urine_microscopic;
use App\urine_physical;
use Illuminate\Http\Request;

class UrineController extends Controller
{
    public function __construct(urineRepository $urineRepository)
    {
        $this->urineRepository = $urineRepository;
    }
    public function store(Request $request){
        try {

            $storeMicro = new urine_microscopic();
            $storeChem = new urine_chemical();
            $storeP = new urine_physical();

            $patient = Patient::find($request->get(0)['patient_id']);
            $patient->urine_flag = true;
            $patient->isReport = true;
            $patient->update();
            $sero = $this->urineRepository->store($request, $storeP, $storeChem,$storeMicro );
            return response()->json([
                'status' => 1,
                'data' => $sero,
            ]);
        }catch (\Exception $e){
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }

    }
}
