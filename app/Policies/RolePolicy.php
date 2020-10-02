<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use App\Services\DashboardAccessService;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    protected $accessService;

    public function __construct(DashboardAccessService $dashboardAccessService)
    {
        $this->accessService = $dashboardAccessService;
    }
    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @param String $routeName
     * @return bool
     */
    public function viewAny(User $user, String $routeName) : bool
    {
        return $this->accessService->canUserPerformActionByRouteName($user, $routeName);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param String $routeName
     * @return bool
     */
    public function view(User $user, String $routeName) : bool
    {
        return $this->accessService->canUserPerformActionByRouteName($user, $routeName);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @param String $routeName
     * @return bool
     */
    public function create(User $user, String $routeName) : bool
    {
        return $this->accessService->canUserPerformActionByRouteName($user, $routeName);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param String $routeName
     * @return bool
     */
    public function update(User $user, String $routeName) : bool
    {
        return $this->accessService->canUserPerformActionByRouteName($user, $routeName);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param String $routeName
     * @return bool
     */
    public function delete(User $user, String $routeName) : bool
    {
        return $this->accessService->canUserPerformActionByRouteName($user, $routeName);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param String $routeName
     * @return bool
     */
    public function restore(User $user, String $routeName) : bool
    {
        return $this->accessService->canUserPerformActionByRouteName($user, $routeName);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param String $routeName
     * @return bool
     */
    public function forceDelete(User $user, String $routeName) : bool
    {
        return $this->accessService->canUserPerformActionByRouteName($user, $routeName);
    }
}
