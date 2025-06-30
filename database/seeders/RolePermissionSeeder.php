<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
    $admin = Role::create(['name' => 'admin']);
    $editor = Role::create(['name' => 'editor']);

    $permissions = [
        'post-create',
        'post-edit',
        'post-delete',
        'category-manage',
        'user-manage',
    ];

    foreach ($permissions as $perm) {
        Permission::create(['name' => $perm]);
    }

    $admin->givePermissionTo(Permission::all());
    $editor->givePermissionTo(['post-create', 'post-edit']);
    }
}
