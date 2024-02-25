<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\crm\user\models\User;
use App\crm\user\request\userCreationRequest ;
use App\crm\user\service\userService  ;
use Illuminate\Http\Request;

class userController extends Controller
{
    private userService $userservice;
    const TOKEN_NAME='personal';
    public function __construct( userservice $userservice) {
        $this->userservice=$userservice ;
    }
    // public function index(Request $request)  {
    //     return $this->index($request);
    // }
    public function index()  {
        // return User::where('customer_id',$id)->get();
        return User::all();
    }

    // public function view($id)  {
    //     return $this->userservice->view($id);
    // }

    public function create(userCreationRequest $request )  {
        $user= $this->userservice->create($request);
        return response()->json(
            [
                'user'=>$user,
                'token'=>$user->createToken(self::TOKEN_NAME)->plainTextToken,
            ]
        );
        return $user;
    }

    // public function update1(Request $request,$id)  {
    //     return $this->userservice->update1($request,$id);
    // }

    // public function delete1(Request $request,$id)  {
    //     return $this->userservice->delete1($request,$id);
    // }
}
