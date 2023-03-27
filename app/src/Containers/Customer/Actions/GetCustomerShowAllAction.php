<?php


namespace App\Containers\Customer\Actions;


use App\Containers\Customer\Proxies\CustomerEloquentProxy;

class GetCustomerShowAllAction
{
    private CustomerEloquentProxy $customerEloquentProxy;

    public function __construct(CustomerEloquentProxy $customerEloquentProxy)
    {
        $this->customerEloquentProxy = $customerEloquentProxy;
    }

    public function execute(int $customer_id)
    {
        $customer = $this->customerEloquentProxy->getQuery()->with(['groups'])->where('id', $customer_id)->first();

        return $customer;
    }
}
