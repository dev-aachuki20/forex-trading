<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;


class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $language[0] = [
            'id'             => 1,
            'code'           => 'en',
            'name'           => 'English',
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'     => date('Y-m-d H:i:s'),
        ];

        $language[1] = [
            'id'             => 2,
            'code'           => 'jp',
            'name'           => 'Japanese',
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'     => date('Y-m-d H:i:s'),
        ];

        $language[2] = [
            'id'             => 3,
            'code'           => 'thai',
            'name'       => 'Thai',
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'     => date('Y-m-d H:i:s'),
        ];

        foreach ($language as $key => $lang) {
            $createdLanguage =  Language::create($lang);
        }
    }
}
