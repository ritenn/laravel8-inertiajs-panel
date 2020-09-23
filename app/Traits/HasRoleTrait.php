<?php
declare(strict_types=1);

namespace App\Traits;


use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Database\Eloquent\Relations\Relation;

trait HasRoleTrait {

    /**
     * @return Relation|null
     */
    public function rolePivot() : ?Relation
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }

    /**
     * @return HasOneThrough|null
     */
    public function getRole() : ?Relation
    {
        return $this->hasOneThrough(Role::class, RoleUser::class, 'user_id', 'id', 'id', 'role_id');
    }

    /**
     * @return bool
     */
    public function unassignCurrentRole() : bool
    {
        return (bool) $this->rolePivot()->delete();
    }

    /**
     * @param string $roleName
     * @return RoleUser|null
     */
    public function assignRoleByName(string $roleName) : ?RoleUser
    {
        $roleId = $this->getRoleIdByName($roleName);

        if ($roleId === null)
        {
            return null;
        }

        $this->unassignCurrentRole();

        return $this->rolePivot()->create(['user_id' => $this->id, 'role_id' => $roleId]);
    }

    /**
     * @param string $roleName
     * @return int|null
     */
    public function getRoleIdByName(string $roleName) : ?int
    {
        return Role::where('name', $roleName)->pluck('id')->first();
    }
}
