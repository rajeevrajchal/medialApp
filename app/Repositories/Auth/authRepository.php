<?php
namespace App\Repositories\Auth;

use Illuminate\Http\Request;

interface authRepository{
    public function login(Request $request);
}
