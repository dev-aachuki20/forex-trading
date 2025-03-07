<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            UsersTableSeeder::class,
            PermissionRoleTableSeeder::class,
            LanguageTableSeeder::class,
            LocalizationTableSeeder::class,
            SettingSeeder::class,
            PageBannerSeeder::class,
            SectionSettingSeeder::class,
            // RoleUserTableSeeder::class,
        ]);



        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
