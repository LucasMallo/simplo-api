<?php


namespace App\Containers\Customer\Proxies;

use App\Containers\Customer\Models\Customer;
use App\Ship\Abstracts\Proxies\BaseEloquentProxy;

class CustomerEloquentProxy extends BaseEloquentProxy
{
    protected const MODEL = Customer::class;
}
