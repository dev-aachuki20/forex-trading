<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Permission;
use App\Models\Role;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Permission::create(['name' => 'create-users', 'guard_name'=>'web']);
        Permission::create(['name' => 'edit-users', 'guard_name'=>'web']);
        Permission::create(['name' => 'delete-users', 'guard_name'=>'web']);

        Permission::create(['name' => 'create-blog-posts', 'guard_name'=>'web']);
        Permission::create(['name' => 'edit-blog-posts', 'guard_name'=>'web']);
        Permission::create(['name' => 'delete-blog-posts', 'guard_name'=>'web']);

        $adminRole = Role::create(['name' => 'admin1','guard_name'=>'web']);
        $editorRole = Role::create(['name' => 'user1','guard_name'=>'web']);

        $adminRole->givePermissionTo([
            'create-users',
            'edit-users',
            'delete-users',
            'create-blog-posts',
            'edit-blog-posts',
            'delete-blog-posts',
        ]);

        $editorRole->givePermissionTo([
            'create-blog-posts',
            'edit-blog-posts',
            'delete-blog-posts',
        ]);
    }
}
