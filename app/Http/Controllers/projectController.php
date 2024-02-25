<?php

namespace App\Http\Controllers;

use App\crm\customer\service\customerService;
use App\crm\project\request\createProjectRequest;
use App\crm\project\service\projectService ;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class ProjectController extends Controller{
    private projectService $projectservice;
    private customerService $customerservice;
    public function __construct(projectService $projectservice,customerService $customerservice){
        $this->projectservice=$projectservice;
        $this->customerservice=$customerservice;
    }
    public function index($id)  {

        return $this->projectservice->index($id);
    }
    public function view($customerId,$id)  {

        return $this->projectservice->view($customerId,$id);
    }
    public function create(createProjectRequest $request,$customerId)  {
        $customer=$this->customerservice->view($customerId);
        // if($customer==404) return response()->json(['status'=>'not found',Response::HTTP_NOT_FOUND ]);
       return $this->projectservice->create($request,$customerId);
    return $customer;
    }
    public function update(Request $request,$customerId,$id)  {
       return $this->projectservice->update($request,$customerId,$id);
    }
    public function delete(Request $request,$customerId,$id)  {
       return $this->delete($request,$customerId,$id);
    }
}
