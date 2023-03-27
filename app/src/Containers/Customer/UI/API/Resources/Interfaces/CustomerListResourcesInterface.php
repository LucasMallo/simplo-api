<?php

namespace App\Containers\Customer\UI\API\Resources\Interfaces;

use App\Containers\Customer\Collections\CustomerCollection;

interface CustomerListResourceInterface
{
    public function fromCollection(CustomerCollection $bookCollection): array;
}
