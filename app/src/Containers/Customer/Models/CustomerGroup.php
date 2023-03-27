<?php

namespace App\Containers\Customer\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerGroup extends Model
{
    public $timestamps = false;

    protected $table = 'customer_group';
    protected $fillable = [
        'customer_id',
        'group_id',
    ];

    protected $casts = [];
}
