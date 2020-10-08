<?php

namespace App\Contracts\Services;


use Illuminate\Support\Collection;

interface PermissionContract {

    /**
     * @description Retrieves cached routes list && store in cache if doesn't exists yet.
     *
     * @return Collection|null
     */
    public function getCacheRoutesList();

    /**
     * @description Removes route names list from cache.
     *
     * @return Collection|null
     */
    public function clearCachedRoutesList();

}
