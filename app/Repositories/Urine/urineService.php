<?php

namespace App\Repositories\Urine;

use App\urine_chemical;
use App\urine_microscopic;
use App\urine_physical;
use Illuminate\Http\Request;

class urineService implements urineRepository{
    public function store(Request $request,
                          urine_physical $urine_physical,
                          urine_chemical $urine_chemical,
                          urine_microscopic $urine_microscopic
    )
    {
        try {
            $data['urine_microscopic'] = urine_microscopic::create($request->get(2));
            $data['urine_chemical'] = urine_chemical::create($request->get(1));
            $data['urine_physical'] = urine_physical::create($request->get(0));
            return ['urine' => $data] ;
        }catch(\Exception $e){
            throw $e;
        }
    }
}
