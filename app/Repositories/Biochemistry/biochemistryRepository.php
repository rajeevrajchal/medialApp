<?php
namespace App\Repositories\Biochemistry;

use App\Biochemistry;
use App\Biochemistry_lft;
use App\Biochemistry_rft;
use Illuminate\Http\Request;

interface biochemistryRepository
{
    public function store(Request $request,
                          Biochemistry $biochemistry,
                          Biochemistry_lft $biochemistry_lft,
                          Biochemistry_rft $biochemistry_rft
    );
}
