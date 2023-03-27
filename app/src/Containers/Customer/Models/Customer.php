<?php

namespace App\Containers\Customer\Models;

use App\Containers\Group\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Customer extends Model
{
    const CREATED_AT = '_created';
    const UPDATED_AT = '_updated';

    protected $table = 'customer';
    protected $fillable = [
        'firstname',
        'surname',
        'email',
        'phone',
        '_created',
        '_updated',
        '_deleted',
    ];
    protected $casts = [];

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class);
    }
}
