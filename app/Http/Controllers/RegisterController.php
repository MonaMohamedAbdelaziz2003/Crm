<?php

namespace App\Http\Controllers;

use App\crm\user\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)

    {

        // dd($request);
        $validator = Validator::make($request->all(),[

            'name'     => 'required',

            'email'    => 'required',

            'password' => 'required'

        ]);
        if($validator->fails()) {

            return response()->json([

                'success' => false,

                'message' => $validator->errors()->first()

            ]);

        }
        $newuser=new User();
        $newuser->name=$request->get('name');
        $newuser->email=$request->get('email');
        $newuser->password=Hash::make($request->get('password'));
        $newuser->save();
        // $user = User::create([

        //     'name'     => $request->name,

        //     'email'    => $request->email,

        //     'password' => Hash::make($request->password),

        // ]);

        // $user->createToken('token')->accessToken;

        return response()->json([

            'success' => true,

            'message' => 'User register successfully.'

        ]);
        return $newuser;

    }
}
