<?php
namespace App\crm\customer\repositorie;
use App\crm\customer\models\Customer;
use Illuminate\Database\Eloquent\Model;
use App\crm\Base\repositorie\Repository ;

class customerRepository extends Repository{
    private Model $customer;
    public function __construct(Customer $customer)
    {
        $this->setModel($customer);
    }
    public function analystic(){
        return [];
    }

}
