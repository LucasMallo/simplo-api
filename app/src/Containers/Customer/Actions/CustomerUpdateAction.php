<?php


namespace App\Containers\Customer\Actions;


use App\Containers\Customer\Proxies\CustomerEloquentProxy;
use App\Containers\Customer\Proxies\CustomerGroupEloquentProxy;
use App\Containers\Customer\UI\API\Requests\CustomerRequest;

class CustomerUpdateAction
{
    private CustomerEloquentProxy $customerEloquentProxy;
    private CustomerGroupEloquentProxy $customerGroupEloquentProxy;

    public function __construct(CustomerEloquentProxy $customerEloquentProxy, CustomerGroupEloquentProxy $customerGroupEloquentProxy)
    {
        $this->customerEloquentProxy = $customerEloquentProxy;
        $this->customerGroupEloquentProxy = $customerGroupEloquentProxy;
    }

    public function execute(int $customer_id, CustomerRequest $request)
    {
        $data = $request->all();
        $customer = $this->customerEloquentProxy->updateById(
            $customer_id, 
            $data
        );

        $customer->groups()->sync($data['groups']);

        return $customer;
    }
}
