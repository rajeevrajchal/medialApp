<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Repositories\Serology\serologyRepository;
use App\Serology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SerologyController extends Controller
{
    public function __construct(serologyRepository $serologyRepository)
    {
        $this->serologyRepository = $serologyRepository;
    }

    public function store(Request $request){
        try {
            $storeSero = new Serology();
            $patient = Patient::find($request->patient_id);
            $patient->serology_flag = true;
            $patient->isReport = true;
            $patient->update();
            $sero = $this->serologyRepository->storeSerology($request, $storeSero);
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

    public function index(){
        try {

            $allSero = $this->serologyRepository->getSerology();
            return response()->json([
                'status' => 1,
                'data' => $allSero
            ]);
        }catch (\Exception $e){
            throw $e;
        }
    }

}
