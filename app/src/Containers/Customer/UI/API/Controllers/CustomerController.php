<?php

namespace App\Containers\Customer\UI\API\Controllers;

use App\Containers\Customer\Actions\CustomerDeleteAction;
use App\Containers\Customer\Actions\CustomerStoreAction;
use App\Containers\Customer\Actions\CustomerUpdateAction;
use App\Containers\Customer\Actions\Interfaces\GetCustomerActionInterface;
use App\Containers\Customer\UI\API\Resources\CustomerListResource;
use App\Ship\Abstracts\Controllers\Controller;
use App\Containers\Customer\Actions\GetCustomerShowAction;
use App\Containers\Customer\Actions\GetCustomerShowAllAction;
use App\Containers\Customer\UI\API\Requests\CustomerRequest;
use App\Ship\Http\Requests\API\PaginateRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function list(
        PaginateRequest $request,
        CustomerListResource $customerListResource,
        GetCustomerActionInterface $getCustomerListAction
    )
    {
        $customerCollection = $getCustomerListAction->execute($request);

        return response()->json($customerListResource->fromCollection($customerCollection));
    }

    public function show(
        int $customer_id,
        GetCustomerShowAction $getCustomerShowAction
    )
    {
        $customer = $getCustomerShowAction->execute($customer_id);

        return response()->json($customer);
    }

    public function showAll(
        int $customer_id,
        GetCustomerShowAllAction $getCustomerShowAction
    )
    {
        $customer = $getCustomerShowAction->execute($customer_id);

        return response()->json($customer);
    }

    public function store(
        CustomerRequest $request,
        CustomerStoreAction $customerStoreAction
    )
    {

            $customer = $customerStoreAction->execute($request);
    
            return response()->json($customer);
    }

    public function update(
        int $customer_id,
        CustomerRequest $request,
        CustomerUpdateAction $customerUpdateAction
    )
    {

            $customer = $customerUpdateAction->execute($customer_id, $request);
    
            return response()->json($customer);
    }

    public function delete(
        int $customer_id,
        CustomerDeleteAction $CustomerDeleteAction
    )
    {
        $result = $CustomerDeleteAction->execute($customer_id);

        return response()->json($result);
    }
}
