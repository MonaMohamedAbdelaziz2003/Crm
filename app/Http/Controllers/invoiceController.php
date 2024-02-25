<?php

namespace App\Http\Controllers;

use App\crm\invoice\service\invoiceService;
use Illuminate\Http\Request;


class invoiceController extends Controller{
    private invoiceService $invoiceService;
    public function __construct( invoiceService $invoiceService)
    {
        $this->invoiceService=$invoiceService;
    }

    public function index($id)  {
        return $this->invoiceService->index($id);
    }
    public function view($id){
        return $this->invoiceService->view($id);;
    }
    public function create(Request $request,$customerId)  {
     return $this->invoiceService->create($request,$customerId);
    }
    public function update(Request $request,$customerId,$id)  {
      return $this->invoiceService->update($request,$customerId,$id);
    }
    public function delete(Request $request,$customerId,$id)  {
      return $this->invoiceService->delete($request,$customerId,$id);
    }
}
