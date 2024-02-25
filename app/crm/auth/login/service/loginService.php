<?php
namespace App\crm\auth\login\service;
use App\crm\auth\login\request\loginRequest;
use App\crm\user\models\User;
use Illuminate\Support\Facades\Auth;
class loginService{
    public function login(loginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if(!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found.'

            ]);
        }

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            $user->token = $user->createToken('myApp')->plainTextToken;
            return response()->json([
                'success' => true,
                'message' => 'User login successfully.',
                'data'    => $user
            ]);
        }

    }
}
