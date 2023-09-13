<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $site_settings = [
            // site
            [
                'id'     => 1,
                'key'    => 'title',
                'value'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has',
                'type'   => 'text',
                'display_name'  => 'Title',
                'group'  => 'site',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'id'     => 2,
                'key'    => 'site_logo',
                'value'  => null,
                'type'   => 'image',
                'display_name'  => 'Site Logo',
                'group'  => 'site',
                'details' => '220 × 51',
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'id'     => 3,
                'key'    => 'favicon',
                'value'  => null,
                'type'   => 'image',
                'display_name'  => 'Favicon',
                'group'  => 'site',
                'details' => '32 × 32',
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'id'     => 4,
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
                'id'     => 5,
                'key'    => 'facebook',
                'value'  => 'https://www.facebook.com/',
                'type'   => 'text',
                'display_name'  => 'Facebook Url',
                'group'  => 'social_media',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'id'     => 6,
                'key'    => 'google',
                'value'  => 'https://www.google.com/',
                'type'   => 'text',
                'display_name'  => 'Gmail Url',
                'group'  => 'social_media',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'id'     => 7,
                'key'    => 'twitter',
                'value'  => 'https://www.twitter.com/',
                'type'   => 'text',
                'display_name'  => 'Twitter Url',
                'group'  => 'social_media',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'id'     => 8,
                'key'    => 'youtube',
                'value'  => 'https://www.youtube.com/',
                'type'   => 'text',
                'display_name'  => 'Youtube Url',
                'group'  => 'social_media',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'id'     => 9,
                'key'    => 'instagram',
                'value'  => 'https://www.instagram.com/',
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
                'id'     => 10,
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
                'id'     => 11,
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

            // banner start
            // [
            //     'id'     => 12,
            //     'key'    => 'banner_title',
            //     'value'  => 'Traders Wanted accelerated trader funding',
            //     'type'   => 'text',
            //     'display_name'  => 'Banner Title',
            //     'group'  => 'banner',
            //     'details' => null,
            //     'status' => 1,
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //     'created_by' => 1,
            // ],
            // [
            //     'id'     => 13,
            //     'key'    => 'banner_description',
            //     'value'  => 'Capitalize on your trading skills and amplify your returns with a funded trader account you keep up to 90% of the profits.',
            //     'type'   => 'textarea',
            //     'display_name'  => 'Description',
            //     'group'  => 'banner',
            //     'details' => null,
            //     'status' => 1,
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //     'created_by' => 1,
            // ],
            // [
            //     'id'     => 14,
            //     'key'    => 'banner_button1',
            //     'value'  => 'Start Trading',
            //     'type'   => 'text',
            //     'display_name'  => 'Banner Button 1',
            //     'group'  => 'banner',
            //     'details' => null,
            //     'status' => 1,
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //     'created_by' => 1,
            // ],
            // [
            //     'id'     => 15,
            //     'key'    => 'banner_button2',
            //     'value'  => 'Learn More',
            //     'type'   => 'text',
            //     'display_name'  => 'Banner Button 2',
            //     'group'  => 'banner',
            //     'details' => null,
            //     'status' => 1,
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //     'created_by' => 1,
            // ],
            // banner end

            // tradable assets
            [
                'id'     => 16,
                'key'    => 'link_one',
                'value'  => '',
                'type'   => 'text',
                'display_name'  => 'Link One',
                'group'  => 'tradable_asset',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'id'     => 17,
                'key'    => 'link_two',
                'value'  => '',
                'type'   => 'text',
                'display_name'  => 'Link Two',
                'group'  => 'tradable_asset',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'id'     => 18,
                'key'    => 'link_three',
                'value'  => '',
                'type'   => 'text',
                'display_name'  => 'Link Three',
                'group'  => 'tradable_asset',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'id'     => 19,
                'key'    => 'link_four',
                'value'  => '',
                'type'   => 'text',
                'display_name'  => 'Link Four',
                'group'  => 'tradable_asset',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],


        ];

        SiteSetting::insert($site_settings);
    }
}
