<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users[0] = [
            'id'             => 1,
            'first_name'     => 'Super',
            'last_name'      => 'Admin',
            'name'           => 'Super Admin',
            'email'          => 'admin@gmail.com',
            'phone'          => '9876543210',
            'password'       => bcrypt('admin@123#'),
            'remember_token' => null,
            'email_verified_at' => date('Y-m-d H:i:s'),
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'     => date('Y-m-d H:i:s'),
        ];

        $users[1] = [
            'id'             => 2,
            'first_name'     => 'Aashi',
            'last_name'      => 'Agarwal',
            'name'           => 'Aashi Agarwal',
            'email'          => 'aashi@gmail.com',
            'phone'          => '9876543211',
            'password'       => bcrypt('aashi@123#'),
            'remember_token' => null,
            'email_verified_at' => date('Y-m-d H:i:s'),
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'     => date('Y-m-d H:i:s'),
        ];

        foreach ($users as $key => $user) {
            $createdUser =  User::create($user);
            $userId = $createdUser->id;
        }

        User::find(1)->assignRole('admin');
        User::find(2)->assignRole('user');
    }
}
