<?php

namespace App;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    public $guarded = [];
    protected $fillable = [
        'name', 'display_name', 'description'
    ];
}
