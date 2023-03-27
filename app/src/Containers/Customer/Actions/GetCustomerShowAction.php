<?php


namespace App\Containers\Customer\Actions;


use App\Containers\Customer\Proxies\CustomerEloquentProxy;

class GetCustomerShowAction
{
    private CustomerEloquentProxy $customerEloquentProxy;

    public function __construct(CustomerEloquentProxy $customerEloquentProxy)
    {
        $this->customerEloquentProxy = $customerEloquentProxy;
    }

    public function execute(int $customer_id)
    {
        $customer = $this->customerEloquentProxy->findOneById(
           $customer_id
        );

        return $customer;
    }
}
