<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class InertiaGlobalProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        Inertia::share('data', function () {
            return [
                'menu' => collect(config('menu'))->toJson(),
                'prev' => url()->previous()
            ];
        });
    }
}
