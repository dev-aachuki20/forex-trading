<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use App\Models\UserRole;
use DB;

// use Spatie\Permission\Models\Permission;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = array('admin','user');
        foreach ($roles as $value) {
            $getroles = Role::where('name', $value)->first();

            if($value == 'admin'){
                $all_permissions = Permission::all();

                foreach ($all_permissions as $per) {
                    $per_id = $per->id;
                    DB::table('role_has_permissions')->insert(['permission_id'=> $per_id,'role_id'=>1]);
                }
            }
            if($value == 'user'){
                $permissions_array = (['webinar_create','webinar_show','webinar_delete','webinar_access','webinar_edit']);
                $all_permissions = Permission::whereIn('name', $permissions_array)->get();
                foreach ($all_permissions as $value) {
                    DB::table('role_has_permissions')->insert(['permission_id'=> $value->id,'role_id'=>2]);
                }

            }


        }
        
        // $admin = Role::find(1);
        // $adminPermission = $admin->givePermissionTo($all_permissions);
        // Role::findOrFail(2)->permissions()->sync($userPermissions);

        // $user = Role::find(2);
        // $userPermission =  $user->givePermissionTo(['webinar_create','webinar_show','webinar_delete','webinar_access','webinar_edit']);
    }
}
