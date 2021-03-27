<?php

namespace App\Http\Controllers\Admin;

use App\Models\Report;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    public function index()
    {
        // $role = Role::create(['name' => 'kajur']);
        // $permission = Permission::create(['name' => 'lihat berita']);
        // auth()->user()->givePermissionTo('input berita');
        // auth()->user()->assignRole('teknisi');
        // $role = Role::findById(1);
        // $role->givePermissionTo('input laporan');
        // $permission = auth()->user()->permissions;
        // dd($permission);
        // $roles = auth()->user()->getRoleNames();
        // dd($roles);

        $user = auth()->user();
        $role = $user->getRoleNames();
        if($role[0] == null) {
            $user->assignRole('guru');
            $user->givePermissionTo('lihat berita');
        }

        return view('pages.admin.dashboard', [
            'report' => Report::count(),
            'inventory' => Inventory::count(),
            'baik' => Inventory::where('condition', 'Baik')->count(),
            'rusak' => Inventory::where('condition', 'Rusak')->count(),
        ]);
    }
}
