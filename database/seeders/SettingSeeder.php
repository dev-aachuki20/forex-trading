<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            // site
            [
                'id'     => 1,
                'key'    => 'site_logo',
                'value'  => null,
                'type'   => 'image',
                'display_name'  => 'Site Logo',
                'group'  => 'site',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'id'     => 2,
                'key'    => 'favicon',
                'value'  => null,
                'type'   => 'image',
                'display_name'  => 'Favicon',
                'group'  => 'site',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'id'     => 3,
                'key'    => 'address',
                'value'  => '1901 Thornridge Cir. Shiloh, Hawaii 81063',
                'type'   => 'textarea',
                'display_name'  => 'Address',
                'group'  => 'site',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            // site end


            // social_media
            [
                'id'     => 4,
                'key'    => 'facebook',
                'value'  => null,
                'type'   => 'text',
                'display_name'  => 'Facebook Url',
                'group'  => 'social_media',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'id'     => 5,
                'key'    => 'google',
                'value'  => null,
                'type'   => 'text',
                'display_name'  => 'Gmail Url',
                'group'  => 'social_media',
                'details' => null,
                'status' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'id'     => 6,
                'key'    => 'twitter',
                'value'  => null,
                'type'   => 'text',
                'display_name'  => 'Twitter Url',
                'group'  => 'social_media',
                'details' => null,
                'status' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'id'     => 7,
                'key'    => 'youtube',
                'value'  => null,
                'type'   => 'text',
                'display_name'  => 'Youtube Url',
                'group'  => 'social_media',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'id'     => 8,
                'key'    => 'instagram',
                'value'  => null,
                'type'   => 'text',
                'display_name'  => 'Instagram Url',
                'group'  => 'social_media',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            // social_media end

            // support start
            [
                'id'     => 9,
                'key'    => 'support_email',
                'value'  => 'forextrading@gmail.com',
                'type'   => 'text',
                'display_name'  => 'Email Us',
                'group'  => 'support',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'id'     => 10,
                'key'    => 'support_phone',
                'value'  => '+ 91 1234567890',
                'type'   => 'text',
                'display_name'  => 'Call Us',
                'group'  => 'support',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],


        ];

        SiteSetting::insert($settings);
    }
}
