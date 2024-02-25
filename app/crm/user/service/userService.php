<?php
namespace App\crm\user\service;

use App\crm\user\event\userCreation;
use App\crm\user\request\userCreationRequest;
use Illuminate\Support\Facades\Hash;
use App\crm\user\models\User;
use Illuminate\Http\Request;

class userService{
    public function index($id)  {
        // return User::where('customer_id',$id)->get();
        return User::all();
    }
    // public function view($customerId,$id)  {
    //     $user=User::find($id);
    //     $customerId=(int) $customerId;
    //      if($user->customer_id != $customerId){
    //          return response()->json(['status'=>'invalid data '],Response::HTTP_BAD_REQUEST);//data ,status
    //      }
    //     return $user;
    // }

    public function create(userCreationRequest $request)  {//userCreationRequest
        $newuser=new User();
        $newuser->name=$request->get('name');
        $newuser->email=$request->get('email');
        $newuser->password=Hash::make($request->get('password'));
        $newuser->save();
        // event(new userCreation($newuser));
        return $newuser;

     }
    //  public function update(Request $request,$customerId,$id)  {
    //     $newuser=User::find($id);
    //     $customerId=(int) $customerId;
    //      if($newuser->customer_id != $customerId){
    //          return response()->json(['status'=>'invalid data '],Response::HTTP_BAD_REQUEST);//data ,status
    //      }
    //      $newuser->user_name=$request->get('user_name');
    //      $newuser->status=$request->get('status');
    //      $newuser->user_cost=$request->get('user_cost');
    //     $newuser->save();
    //     return $newuser;
    //  }
    //  public function delete(Request $request,$customerId,$id)  {
    //     $newuser=User::find($id);
    //     $customerId=(int) $customerId;
    //      if($newuser->customer_id != $customerId){
    //          return response()->json(['status'=>'invalid data '],Response::HTTP_BAD_REQUEST);//data ,status
    //      }
    //     $newuser->delete();
    //  }
}
