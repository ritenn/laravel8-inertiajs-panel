<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoleController extends Controller
{

    public function index()
    {
//        dd(Role::all());
        return Inertia::render('Roles/Index', [
            'roles' => Role::all(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Roles/Create', [
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit(Role $role)
    {
        dd($role);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
