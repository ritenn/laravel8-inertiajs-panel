<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use App\Services\PermissionService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class PermissionController extends Controller
{
    /**
     * @var PermissionService
     */
    private $permissionService;

    /**
     * PermissionController constructor.
     * @param PermissionService $permissionService
     */
    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    /**
     * @return InertiaResponse
     */
    public function index() : InertiaResponse
    {
        return Inertia::render('Permissions/Index', [
            'permissions' => Permission::all(),
        ]);
    }

    /**
     * @return InertiaResponse
     */
    public function create() : InertiaResponse
    {
        return Inertia::render('Permissions/Create', [
            'permissionRouteNamesList' => $this->permissionService->getCacheRoutesList()
        ]);
    }

    /**
     * @param PermissionRequest $request
     * @return RedirectResponse
     */
    public function store(PermissionRequest $request) : RedirectResponse
    {
        if (Permission::create($request->validated()))
        {
            return redirect()->route('panel.permissions.index');
        }

        return redirect()->back()->withErrors('Failed to add permission');
    }

    /**
     * @param Permission $permission
     * @return InertiaResponse
     */
    public function edit(Permission $permission) : InertiaResponse
    {
        $permissionRouteNamesList = $this->permissionService->getCacheRoutesList();

        return Inertia::render('Permissions/Edit', compact('permission','permissionRouteNamesList'));
    }

    /**
     * @param PermissionRequest $request
     * @param Permission $permission
     * @return RedirectResponse
     */
    public function update(PermissionRequest $request, Permission $permission) : RedirectResponse
    {
        if ($permission->update($request->validated()))
        {
            return redirect()->route('panel.permissions.edit', ['permission' => $permission->id]);
        }

        return redirect()->back()->withErrors('Failed to update permission');
    }

    /**
     * @param Permission $permission
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Permission $permission) : RedirectResponse
    {
        if ($permission->delete())
        {
            return redirect()->back();
        }

        return redirect()->back()->withErrors('Failed to delete permission');
    }
}
