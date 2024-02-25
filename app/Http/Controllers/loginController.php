<?php

namespace App\Http\Controllers;

use App\crm\user\models\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class loginController extends Controller

{

    // login api function

    public function login(Request $request)

    {

        $validator = Validator::make($request->all(),[
            'email'    => 'required',
            'password' => 'required'
        ]);
dd( $validator);
        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ]);
        }

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
