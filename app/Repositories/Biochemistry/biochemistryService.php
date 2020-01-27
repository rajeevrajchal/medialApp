<?php
namespace App\Repositories\Biochemistry;

use App\Biochemistry;
use App\Biochemistry_lft;
use App\Biochemistry_rft;
use Illuminate\Http\Request;

class biochemistryService implements biochemistryRepository{
    public function store(Request $request,
                          Biochemistry $biochemistry,
                          Biochemistry_lft $biochemistry_lft,
                          Biochemistry_rft $biochemistry_rft
    )
    {
        try {

            $data['biochemistry'] = Biochemistry::create($request->get(2));
            $data['biochemistrylft'] = Biochemistry_lft::create($request->get(0));
            $data['biochemistryrft'] = Biochemistry_rft::create($request->get(1));
            return ['biochemistry' => $data] ;
        }catch (\Exception $e){

        }

    }
}
