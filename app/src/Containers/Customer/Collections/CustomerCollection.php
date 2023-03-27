<?php

namespace App\Containers\Customer\Collections;

use App\Containers\Customer\DTO\CustomerDTO;
use Illuminate\Support\Collection;

class CustomerCollection extends Collection
{
    public function __construct(CustomerDTO ...$customers)
    {
        parent::__construct($customers);
    }

    public function current(): CustomerDTO
    {
        return parent::current();
    }
}
