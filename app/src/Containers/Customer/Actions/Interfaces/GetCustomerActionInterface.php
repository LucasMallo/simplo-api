<?php

namespace App\Containers\Customer\Actions\Interfaces;

use App\Containers\Customer\Collections\CustomerCollection;
use App\Ship\Http\Requests\API\Interfaces\PaginateRequestInterface;

interface GetCustomerActionInterface
{
    public function execute(PaginateRequestInterface $paginateRequest);
}
