<?php
namespace App\Http\Controllers;

use App\crm\note\models\Note;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class noteController extends Controller{
    public function index(Request $request,$id)  {
        return Note::where('customer_id',$id)->get();
    }

    public function view($id)  {
               $note= Note::find($id);
               if(!$note){
                return response()->json(['status'=>'error'],Response::HTTP_NOT_FOUND);
               }
               return $note;
    }

    public function create(Request $request,$customerId)  {
               $newNote=new Note();
               $newNote->note=$request->get('note');
               $newNote->customer_id=$customerId;
               $newNote->save();
               return $newNote;
    }

    public function update(Request $request,$customerId,$id)  {
        $note= Note::find($id);
        if (!$note){
            return response()->json(['status'=>'error'],Response::HTTP_NOT_FOUND);//data ,status
        }
        $customerId=(int) $customerId;
        if($note->customer_id != $customerId){
            return response()->json(['status'=>'invalid data '],Response::HTTP_BAD_REQUEST);//data ,status
        }
        $note->note=$request->get('note');
        $note->save();
        return $note;
    }

    public function delete(Request $request,$customerId,$id)  {
        $note= Note::find($id);
        if (!$note){
            return response()->json(['status'=>'not found'],Response::HTTP_NOT_FOUND);//data ,status
        }
        $customerId=(int) $customerId;
        if($note->customer_id != $customerId){
            return response()->json(['status'=>'invalid data '],Response::HTTP_BAD_REQUEST);//data ,status
        }
        $note->delete();
        }

}
?>
