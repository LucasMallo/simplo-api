<?php


namespace App\Containers\Customer\Actions;


use App\Containers\Customer\Proxies\CustomerEloquentProxy;
use App\Containers\Customer\Proxies\CustomerGroupEloquentProxy;
use App\Containers\Customer\UI\API\Requests\CustomerRequest;
use Illuminate\Http\Request;

class CustomerStoreAction
{
    private CustomerEloquentProxy $customerEloquentProxy;
    private CustomerGroupEloquentProxy $customerGroupEloquentProxy;

    public function __construct(CustomerEloquentProxy $customerEloquentProxy, CustomerGroupEloquentProxy $customerGroupEloquentProxy)
    {
        $this->customerEloquentProxy = $customerEloquentProxy;
        $this->customerGroupEloquentProxy = $customerGroupEloquentProxy;
    }

    public function execute(CustomerRequest $request)
    {
        $data = $request->all();
        $customer = $this->customerEloquentProxy->create(
            $data
        );

        if (isset($data['groups'])) {
            foreach ($data['groups'] as $group) {
                $this->customerGroupEloquentProxy->create(
                    [
                        'customer_id' => $customer['id'],
                        'group_id' => $group
                    ]
                    );
            }
        }

        return $customer;
    }
}
