<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardPermissionsMiddleware
{
    /**
     * @laravel_doc: https://laravel.com/docs/8.x/authorization#via-controller-helpers
     */
    CONST METHODS_TO_POLICY = [
        'index' =>	'viewAny',
        'show' => 'view',
        'create' => 'create',
        'store'	=> 'create',
        'edit' => 'update',
        'update' => 'update',
        'destroy' => 'delete'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $requestFullActionName = $request->route()->getName();
        $requestedAction = \Str::of($requestFullActionName)->explode('.')->last();

        /**
         * Check if user is allowed to perform action.
         */
        if (\Arr::has(self::METHODS_TO_POLICY, $requestedAction))
        {
            $policyName = \Arr::get(self::METHODS_TO_POLICY, $requestedAction);

            if (auth()->user()->can($policyName, [Role::class, $requestFullActionName]))
            {
                return $next($request);
            }
        }

        /**
         * Redirect user without permissions to dashboard, if he is allowed.
         */
        if (auth()->user()->can('viewAny', [Role::class, 'panel.dashboard.index']))
        {
            return redirect()->route('panel.dashboard.index');
        }

        /**
         * In other cases, logout user.
         */
        Auth::guard('web')->logout();

        return redirect()->route('login');
    }
}
