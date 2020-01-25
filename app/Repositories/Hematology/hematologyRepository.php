<?php
namespace App\Repositories\Hematology;

use App\hemato_cbc;
use App\hemato_dlc;
use App\hematology;
use Illuminate\Http\Request;

interface hematologyRepository{
    public function store(Request $request,
                            hematology $hematology,
                            hemato_cbc $hemato_cbc,
                            hemato_dlc $hemato_dlc
    );


}
