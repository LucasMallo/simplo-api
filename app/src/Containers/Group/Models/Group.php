<?php

namespace App\Containers\Group\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    const CREATED_AT = '_created';
    const UPDATED_AT = '_updated';

    protected $table = 'group';
    protected $fillable = [
        'name',
        '_created',
        '_updated',
        '_deleted',
    ];
    protected $casts = [];
}
