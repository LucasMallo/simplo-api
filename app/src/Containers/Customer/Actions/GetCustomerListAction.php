<?php


namespace App\Containers\Customer\Actions;


use Carbon\Carbon;
use App\Containers\Customer\Collections\CustomerCollection;
use App\Containers\Customer\DTO\CustomerDTO;
use App\Containers\Customer\Proxies\CustomerEloquentProxy;
use App\Containers\Customer\Actions\Interfaces\GetCustomerActionInterface;
use App\Ship\Http\Requests\API\Interfaces\PaginateRequestInterface;

class GetCustomerListAction implements GetCustomerActionInterface
{
    private CustomerEloquentProxy $customerEloquentProxy;

    public function __construct(CustomerEloquentProxy $customerEloquentProxy)
    {
        $this->customerEloquentProxy = $customerEloquentProxy;
    }

    public function execute(PaginateRequestInterface $paginateRequest): CustomerCollection
    {
        $customerCollection = [];
        $customerList = $this->customerEloquentProxy->findAll(
            [],
            $paginateRequest->getLimit(),
            $paginateRequest->getOffset()
        );

        foreach ($customerList as $customer) {
            $customer['_created'] = Carbon::parse($customer['_created']);
            $customer['_updated'] = Carbon::parse($customer['_updated']);
            $customerCollection[] = new CustomerDTO($customer);
        }

        return new CustomerCollection(...$customerCollection);
    }
}
