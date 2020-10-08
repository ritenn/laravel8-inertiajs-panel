<?php

namespace App\Services;


use App\Contracts\Services\PermissionContract;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

class PermissionService implements PermissionContract {

    /**
     * @description Retrieves cached routes list && store in cache if doesn't exists yet.
     *
     * @return Collection|null
     */
    public function getCacheRoutesList() : ?Collection
    {
        if (is_null(Cache::get('permissionRouteNamesList')));
        {
            Cache::forever('permissionRouteNamesList', collect(Route::getRoutes())->filter(function($route) {
                return \Str::contains($route->getName(), 'panel.');
            })
                ->map(function($route) {
                    return $route->getName();
                })
                ->flip()
                ->map(function($value, $key) {
                    return \Str::of($key)
                        ->replaceFirst('panel.', '', $key)
                        ->replace('.', ' ')
                        ->ucfirst()
                        ->__toString();
                })
            );
        }

        return Cache::get('permissionRouteNamesList');
    }

    /**
     * @description Removes route names list from cache.
     *
     * @return Collection|null
     */
    public function clearCachedRoutesList() : ?Collection
    {
        return Cache::forget('permissionRouteNamesList');
    }
}
