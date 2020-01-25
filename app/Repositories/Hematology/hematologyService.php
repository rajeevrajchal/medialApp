<?php
namespace App\Repositories\Hematology;


use App\hemato_cbc;
use App\hemato_dlc;
use App\hematology;
use Illuminate\Http\Request;

class hematologyService implements hematologyRepository{
    public function store(Request $request,
                          hematology $hematology,
                          hemato_cbc $hemato_cbc,
                          hemato_dlc $hemato_dlc
    )
    {
        try {
            $data['hemato'] = hematology::create($request->get(2));
            $data['hema_cbc'] = hemato_cbc::create($request->get(1));
            $data['hema_dlc'] = hemato_dlc::create($request->get(0));
            return ['hematology' => $data] ;
        }catch(\Exception $e){
            throw $e;
        }
    }
}
