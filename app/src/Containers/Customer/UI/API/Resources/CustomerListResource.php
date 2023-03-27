<?php

namespace App\Containers\Customer\UI\API\Resources;

use App\Containers\Customer\Collections\CustomerCollection;
// use App\Containers\Customer\UI\API\Resources\Interfaces\CustomerListResourceInterface;
use App\Ship\Abstracts\Resources\ApiResource;


class CustomerListResource extends ApiResource
{
    public function fromCollection(CustomerCollection $customerCollection): array
    {
        $mappedCollection = [];

        foreach ($customerCollection as $customerDTO) {
            $mappedCollection[] = [
                'id' => $customerDTO->id,
                'firstname' => $customerDTO->firstname,
                'surname' => $customerDTO->surname,
                'email' => $customerDTO->email,
                'phone' => $customerDTO->phone,
            ];
        }

        return $this->wrapResponse($mappedCollection);
    }
}
