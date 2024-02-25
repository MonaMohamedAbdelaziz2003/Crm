<?php

namespace App\Http\Controllers;

use App\crm\invoice\models\Invoice;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function index(Request $req,$name){
            // return view(view:'home');
            // return User::find(2);
            // return User::all();
            // return $req->all();//from url
            // $id= $req->get('id');//from url
            // return User::find($id);
            // return User::where('name',$name)->get();
            // return User::where('name',$name)->orderBy('id')->get();
            /*
            "id": 1,
        "name": "mona",
        "email": "mona@gmail.com",
        "email_verified_at": null,
        "created_at": null,
        "updated_at": null

            */
            // insert
            // $user=new user();
            // $user->id="5";
            // $user->name="neama";
            // $user->password="neama";
            // $user->email="neama@gmail.com";

            // $user1=new user();
            // $user1->id="6";
            // $user1->name="emaan";
            // $user1->password="emaan";
            // $user1->email="emaan@gmail.com";

            // $user->save();
            // $user1->save();
        //    $us= User::find(4);
        //     $us->delete();
        // /////////
        return Invoice::all();
    }
}
