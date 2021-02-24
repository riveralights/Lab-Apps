<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    public function index()
    {
        // $role = Role::create(['name' => 'teknisi']);
        // $permission = Permission::create(['name' => ''])
        return view('pages.admin.dashboard');
    }
}
