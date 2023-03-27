<?php


namespace App\Containers\Customer\Actions\Decorators;


use App\Containers\Customer\Collections\CustomerCollection;
use App\Containers\Customer\Actions\Interfaces\GetCustomerActionInterface;
use App\Ship\Http\Requests\API\Interfaces\PaginateRequestInterface;

class GetCustomerListActionDecorator implements GetCustomerActionInterface
{
    protected GetCustomerActionInterface $GetCustomerActionInterface;

    public function __construct(GetCustomerActionInterface $GetCustomerActionInterface)
    {
        $this->GetCustomerActionInterface = $GetCustomerActionInterface;
    }

    public function execute(PaginateRequestInterface $paginateRequest): CustomerCollection
    {
        return $this->GetCustomerActionInterface->execute($paginateRequest);
    }
}
