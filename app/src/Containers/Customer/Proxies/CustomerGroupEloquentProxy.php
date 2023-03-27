<?php


namespace App\Containers\Customer\Proxies;

use App\Containers\Customer\Models\CustomerGroup;
use App\Ship\Abstracts\Proxies\BaseEloquentProxy;

class CustomerGroupEloquentProxy extends BaseEloquentProxy
{
    protected const MODEL = CustomerGroup::class;
}
