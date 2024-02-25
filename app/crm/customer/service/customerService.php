<?php
namespace App\crm\customer\service;
use App\crm\customer\Events\customerCreation;
use App\crm\customer\repositorie\customerRepository;
use App\crm\customer\models\Customer;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\crm\customer\request\createCustomerRequest;

class customerService{
    private customerRepository $customerRep;
    public function __construct(customerRepository $customerRep)
    {
        $this->customerRep=$customerRep;
    }
    public function index(Request $request)  {
    // return Customer::all();
    return [
        'customer' =>$this->customerRep->all(),
        'statistics'=> $this->customerRep->analystic()
    ];
}
public function view($id)  {
       //$newCustomer= Customer::find($id);
       $newCustomer= $this->customerRep->view($id);
       if(!$newCustomer){
        return Request()->json(['status'=>'error'],Response::HTTP_NOT_FOUND);
       }
       return $newCustomer;
}
public function create(createCustomerRequest $request)  {
       $newCustomer=new Customer();
       $newCustomer->name=$request->get('name');
       $newCustomer->save();
       event(new customerCreation($newCustomer));
       return $newCustomer;
}

public function update1(Request $request,$id)  {
$newCustomer= Customer::find($id);
if (!$newCustomer){
    return request()->json(['status'=>'error'],Response::HTTP_NOT_FOUND);//data ,status
}
   $newCustomer->name=$request->get('name');
   $newCustomer->save();
   return $newCustomer;
}
public function delete1(Request $request,$id)  {
$newCustomer= Customer::find($id);
if (!$newCustomer){
    return request()->json(['status'=>'error'],Response::HTTP_NOT_FOUND);//data ,status
}
   $newCustomer->delete();
   return request()->json(['status'=>'delete'],Response::HTTP_NOT_FOUND);//data ,status
}
}
?>
