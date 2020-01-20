<?php
namespace App\Repositories\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class authService implements authRepository {

    //  authentaction login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            //'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials))
            return response()->json([
                'success' => false,
                'message' => 'Invalid Credentials',
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('sanghamedical');
        $token = $tokenResult->token;
        if($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'success' => true,
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }
}
