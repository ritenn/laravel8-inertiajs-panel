<?php

namespace App\Traits;


trait HasPermissionsTrait {

    public function hasUserRoleContainsPermissions() : bool
    {
        return !is_null(auth()->user()->getRole) && !is_null(auth()->user()->getRole->permissions);
    }
}
