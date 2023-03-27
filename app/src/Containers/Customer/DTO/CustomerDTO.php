<?php

namespace App\Containers\Customer\DTO;

use Carbon\Carbon;
use App\Ship\Abstracts\DTO\DataTransferObject;

class CustomerDTO extends DataTransferObject
{
    public int $id;
    public string $firstname;
    public string $surname;
    public string $email;
    public string $phone;
    public bool $_deleted;
    public Carbon $_created;
    public Carbon $_updated;
}
