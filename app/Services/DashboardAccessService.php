<?php
declare(strict_types=1);

namespace App\Services;


use App\Contracts\Services\DashboardAccessContract;
use App\Models\User;

class DashboardAccessService implements DashboardAccessContract {

    /**
     * @param User $user
     * @param String $routeName
     * @return bool
     */
    public function canUserPerformActionByRouteName(User $user, String $routeName) : bool
    {
        if ($user->hasUserRoleContainsPermissions())
        {
            return $user->getRole->permissions->contains(function($permission) use ($routeName) {

                $permissionActionName = $permission->route_name;

                if (\Str::contains($permissionActionName, '*'))
                {
                    return \Str::of($routeName)->endsWith(
                        \Str::of($permissionActionName)->replace('*', '')
                    );
                }

                return \Str::of($routeName)->exactly($permissionActionName);
            });
        }

        return false;
    }

}
