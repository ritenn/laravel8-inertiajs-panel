<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $users = User::with('getRole')->get();
//        $user = auth()->user()->load('getRole');

//        $user = ;
//        $user = auth()->user()->getRole;

//        $roles = Role::with('users')->get();
//        dd(auth()->user()->assignRoleByName('admin'));
//        dd(auth()->user()->unassignCurrentRole());
//        dd(auth()->user()->getRole);

        return view('test')->with(compact('users'));
    }
}
