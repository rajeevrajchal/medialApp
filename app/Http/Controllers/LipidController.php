<?php

namespace App\Http\Controllers;

use App\Lipid;
use App\Patient;
use App\Repositories\Lipid\lipidRepository;
use Illuminate\Http\Request;

class LipidController extends Controller
{
    public function __construct(lipidRepository $lipidRepository)
    {
        $this->lipidRepository = $lipidRepository;
    }
    public function index(){
        try {

            $allLipid = $this->lipidRepository->getLipid();
            return response()->json([
                'status' => 1,
                'data' => $allLipid
            ]);
        }catch (\Exception $e){
            throw $e;
        }
    }
    public function store(Request $request)
    {

        $storeLipid = new Lipid();
        $patient = Patient::find($request->patient_id);
        $patient->lipid_flag = true;
        $patient->isReport = true;
        $patient->update();
        $lipid = $this->lipidRepository->store($request,$storeLipid);
        return response()->json([
            'status' => 1,
            'data' => $lipid,
        ]);
    }

}
