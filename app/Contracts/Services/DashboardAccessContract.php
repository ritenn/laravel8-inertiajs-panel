<?php

namespace App\Contracts\Services;


use App\Models\User;

interface DashboardAccessContract {

    /**
     * @param User $user
     * @param String $routeName
     * @return bool
     */
    public function canUserPerformActionByRouteName(User $user, String $routeName) : bool;
}
