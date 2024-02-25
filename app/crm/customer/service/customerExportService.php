<?php
namespace App\crm\customer\service;

use App\crm\customer\repositorie\customerRepository;
use app\crm\customer\service\export\exportInterface;
use crm\customer\Exception\invalidExport;

class customerExportService{
    private customerRepository $customerRep;
    public function __construct(customerRepository $customerRep)
    {
        $this->customerRep=$customerRep;
    }

    public function export(string $format){
    $customer=$this->customerRep->all();
    $handler=config('export.exporter')[$format]??null;
        if(!$handler){
            throw new invalidExport(sprintf("formate is invalid is not supported",$format));
        }
    $exported=new $handler;
    if($exported instanceof exportInterface){
         $exported->export($customer->toArray());
    }
    }
}
