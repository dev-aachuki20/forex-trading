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
            'name'           => 'english',
            'icon'           => 'images/eng.svg',
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'     => date('Y-m-d H:i:s'),
        ];

        $language[1] = [
            'id'             => 2,
            'code'           => 'ja',
            'name'           => 'japanese',
            'icon'           => 'images/japan.svg',
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'     => date('Y-m-d H:i:s'),
        ];

        $language[2] = [
            'id'             => 3,
            'code'           => 'th',
            'name'           => 'thai',
            'icon'           => 'images/thai.svg',
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'     => date('Y-m-d H:i:s'),
        ];

        foreach ($language as $key => $lang) {
            $createdLanguage =  Language::create($lang);
        }
    }
}
