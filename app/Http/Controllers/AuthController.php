<?php

namespace App\Http\Controllers;

use App\Repositories\Auth\authRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(authRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login(Request $request){
        $user = $this->authRepository->login($request);
        return $user;
    }

    public function logout(Request $request)
    {

        Auth::logout();
        return response()->json([
            'message' => 'Successfully logged out',
            'success' => true
        ]);
    }
}
