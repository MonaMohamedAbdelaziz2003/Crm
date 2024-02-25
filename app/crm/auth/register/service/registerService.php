<?php
namespace App\crm\auth\register\service;

use App\crm\auth\register\request\registerRequist;
use App\crm\user\models\User;
use Illuminate\Support\Facades\Hash;

class registerService{
    public function register(registerRequist $request){
        $newuser=new User();
        $newuser->name=$request->get('name');
        $newuser->email=$request->get('email');
        $newuser->password=Hash::make($request->get('password'));
        $newuser->save();
        return response()->json([
            'success' => true,
            'message' => 'User register successfully.'
        ]);
    }
}

