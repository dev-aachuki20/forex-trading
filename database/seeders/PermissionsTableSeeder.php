<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $updateDate = $createDate = date('Y-m-d H:i:s');
        $permissions = [
            [
                'name'       => 'permission_create',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'permission_edit',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'permission_show',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'permission_delete',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'permission_access',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'user_management_access',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'user_create',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [   
                'name'      => 'user_edit',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'user_show',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'user_delete',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'user_access',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'blog_access',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'blog_create',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [   
                'name'      => 'blog_edit',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'blog_show',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'blog_delete',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'news_access',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'news_create',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [   
                'name'      => 'news_edit',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'news_show',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'news_delete',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'gallery_access',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'gallery_create',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [   
                'name'      => 'gallery_edit',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'gallery_show',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'gallery_delete',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'partner_logo_access',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'partner_logo_create',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [   
                'name'      => 'partner_logo_edit',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'partner_logo_show',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'partner_logo_delete',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'trade_access',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'trade_create',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [   
                'name'      => 'trade_edit',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'trade_show',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'trade_delete',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'what_include_access',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'what_include_create',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [   
                'name'      => 'what_include_edit',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'what_include_show',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'what_include_delete',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'package_access',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'package_create',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [   
                'name'      => 'package_edit',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'package_show',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'package_delete',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            
            [
                'name'      => 'testimonial_access',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'testimonial_create',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [   
                'name'      => 'testimonial_edit',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'testimonial_show',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'testimonial_delete',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'faq_access',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'faq_create',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [   
                'name'      => 'faq_edit',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'faq_show',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'faq_delete',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'page_access',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'page_create',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [   
                'name'      => 'page_edit',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'page_show',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'page_delete',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'setting_access',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'setting_create',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [   
                'name'      => 'setting_edit',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'setting_show',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'setting_delete',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            
            [
                'name'      => 'team_access',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'team_create',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [   
                'name'      => 'team_edit',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'team_show',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'team_delete',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'webinar_access',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'webinar_create',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [   
                'name'      => 'webinar_edit',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'webinar_show',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'webinar_delete',
                'guard_name' => 'web',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            
        ];
        $permission = Permission::insert($permissions);
    }
}
