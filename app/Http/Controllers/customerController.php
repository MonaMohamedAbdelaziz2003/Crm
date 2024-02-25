<?php

namespace App\Http\Controllers;
use App\crm\customer\service\customerService;
use App\crm\customer\request\createCustomerRequest;
use App\crm\customer\service\customerExportService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class customerController extends Controller{
    private customerService $customerService;
    private customerExportService $customerExportService;
    public function __construct( customerService $customerService,customerExportService $customerExportService)
    {
        $this->customerService=$customerService;
        $this->customerExportService=$customerExportService;
    }

    public function index(Request $request)  {
        $customer = $this->customerService->index($request);
        // return responseBilder()
        // ->setData($customer)
        // ->response();
        return $customer;
    }

    public function view($id)  {
        $customer= $this->customerService->view($id);
        // if(!$customer) {
        //     return responseBilder()
        //         ->setStatusCode(JsonResponse::HTTP_NOT_FOUND)
        //         ->setError(['generic' => 'Customer not found'])
        //         ->response();
        // }
        // return responseBilder()
        //     ->setData($customer)
        //     ->response();
        return $customer;
    }

    public function create(createCustomerRequest $request)  {
        return $this->customerService->create($request);
    }

    public function update1(Request $request,$id)  {
        return $this->customerService->update1($request,$id);
    }

    public function delete1(Request $request,$id)  {
        return $this->customerService->delete1($request,$id);
    }
    public function export(Request $request)  {
        $this->customerExportService->export($request->get('format','json'));
    }
}
?>
