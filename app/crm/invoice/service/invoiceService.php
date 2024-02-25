<?php
namespace App\crm\invoice\service;

use App\crm\invoice\models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class invoiceService {
    public function index($id)  {
        return Invoice::where('customer_id',$id)->get();
    }
    public function view($id)  {
        return Invoice::find($id)??'faild';
    }
    public function create(Request $request,$customerId)  {
       $newInvoice=new Invoice();
       $newInvoice->total=$request->get('total');
       $newInvoice->item=$request->get('item');
       $newInvoice->customer_id=$customerId;
       $newInvoice->status=$request->get('status');
       $newInvoice->save();
       return $newInvoice;
    }
    public function update(Request $request,$customerId,$id)  {
       $newInvoice=Invoice::find($id);
       $customerId=(int) $customerId;
        if($newInvoice->customer_id != $customerId){
            return response()->json(['status'=>'invalid data '],Response::HTTP_BAD_REQUEST);//data ,status
        }
       $newInvoice->total=$request->get('totel');
       $newInvoice->item=$request->get('item');
       $newInvoice->status=$request->get('status');
       $newInvoice->save();
       return $newInvoice;
    }
    public function delete(Request $request,$customerId,$id)  {
       $newInvoice=Invoice::find($id);
       $customerId=(int) $customerId;
        if($newInvoice->customer_id != $customerId){
            return response()->json(['status'=>'invalid data '],Response::HTTP_BAD_REQUEST);//data ,status
        }
       $newInvoice->delete();
    }
}
