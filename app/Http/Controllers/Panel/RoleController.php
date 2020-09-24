<?php

namespace App\Http\Controllers\Panel;


use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Inertia\Response as InertiaResponse;
use Inertia\Inertia;

class RoleController extends Controller
{

    /**
     * @return InertiaResponse
     */
    public function index() : InertiaResponse
    {
        return Inertia::render('Roles/Index', [
            'roles' => Role::all(),
        ]);
    }

    /**
     * @return InertiaResponse
     */
    public function create() : InertiaResponse
    {
        return Inertia::render('Roles/Create', []);
    }

    /**
     * @param RoleRequest $request
     * @return RedirectResponse
     */
    public function store(RoleRequest $request) : RedirectResponse
    {
        if (Role::create($request->validated()))
        {
            return redirect()->route('roles.index');
        }

        return redirect()->back()->withErrors('Failed to add role');
    }

    /**
     * @param Role $role
     * @return InertiaResponse
     */
    public function edit(Role $role) : InertiaResponse
    {
        return Inertia::render('Roles/Edit', compact('role'));
    }

    /**
     * @param RoleRequest $request
     * @param Role $role
     * @return RedirectResponse
     */
    public function update(RoleRequest $request, Role $role) : RedirectResponse
    {
        if ($role->update($request->validated()))
        {
            return redirect()->route('roles.edit', ['role' => $role->id]);
        }

        return redirect()->back()->withErrors('Failed to update role');
    }

    /**
     * @param Role $role
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Role $role) : RedirectResponse
    {
        if ($role->delete())
        {
            return redirect()->back();
        }

        return redirect()->back()->withErrors('Failed to delete role');
    }
}
