<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Tạo quyền
        Permission::create(['name' => 'edit stories']);
        Permission::create(['name' => 'delete stories']);
        Permission::create(['name' => 'view stories']);

        // Tạo vai trò admin và gán quyền
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(['edit stories', 'delete stories', 'view stories']);

        // Tạo vai trò user và gán quyền xem truyện
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo('view stories');
    }
}

