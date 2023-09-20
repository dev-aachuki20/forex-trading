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
        DB::table('site_settings')->truncate();

        $site_settings = [
            // site
            // [
            //     'key'    => 'title',
            //     'value'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has',
            //     'type'   => 'text',
            //     'display_name'  => 'Title (English )',
            //     'group'  => 'site',
            //     'details' => null,
            //     'status' => 1,
            //     'language_id' => 1,
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //     'created_by' => 1,
            // ],
            // [
            //     'key'    => 'title',
            //     'value'  => 'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。Lorem Ipsum は、',
            //     'type'   => 'text',
            //     'display_name'  => 'Title (Japanese)',
            //     'group'  => 'site',
            //     'details' => null,
            //     'status' => 1,
            //     'language_id' => 2,
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //     'created_by' => 1,
            // ],
            // [
            //     'key'    => 'title',
            //     'value'  => 'Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ที่ Lorem Ipsum มี',
            //     'type'   => 'text',
            //     'display_name'  => 'Title (Thai)',
            //     'group'  => 'site',
            //     'details' => null,
            //     'status' => 1,
            //     'language_id' => 3,
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //     'created_by' => 1,
            // ],
            [
                'key'    => 'site_logo',
                'value'  => null,
                'type'   => 'image',
                'display_name'  => 'Site Logo',
                'group'  => 'site',
                'details' => '166 × 43',
                'status' => 1,
                'language_id' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'key'    => 'favicon',
                'value'  => null,
                'type'   => 'image',
                'display_name'  => 'Favicon',
                'group'  => 'site',
                'details' => '32 × 32',
                'status' => 1,
                'language_id' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'key'    => 'footer_logo',
                'value'  => null,
                'type'   => 'image',
                'display_name'  => 'Footer Logo',
                'group'  => 'site',
                'details' => '220 × 57',
                'status' => 1,
                'language_id' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'key'    => 'address',
                'value'  => '1901 Thornridge Cir. Shiloh, Hawaii 81063',
                'type'   => 'textarea',
                'display_name'  => 'Address',
                'group'  => 'site',
                'details' => null,
                'status' => 1,
                'language_id' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            // site end


            // social_media
            [
                'key'    => 'facebook',
                'value'  => 'https://www.facebook.com/',
                'type'   => 'text',
                'display_name'  => 'Facebook Url',
                'group'  => 'social_media',
                'details' => null,
                'status' => 1,
                'language_id' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'key'    => 'google',
                'value'  => 'https://www.google.com/',
                'type'   => 'text',
                'display_name'  => 'Gmail Url',
                'group'  => 'social_media',
                'details' => null,
                'status' => 1,
                'language_id' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'key'    => 'twitter',
                'value'  => 'https://www.twitter.com/',
                'type'   => 'text',
                'display_name'  => 'Twitter Url',
                'group'  => 'social_media',
                'details' => null,
                'status' => 1,
                'language_id' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'key'    => 'youtube',
                'value'  => 'https://www.youtube.com/',
                'type'   => 'text',
                'display_name'  => 'Youtube Url',
                'group'  => 'social_media',
                'details' => null,
                'status' => 1,
                'language_id' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'key'    => 'instagram',
                'value'  => 'https://www.instagram.com/',
                'type'   => 'text',
                'display_name'  => 'Instagram Url',
                'group'  => 'social_media',
                'details' => null,
                'status' => 1,
                'language_id' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            // social_media end

            // support start
            [
                'key'    => 'support_email',
                'value'  => 'forextrading@gmail.com',
                'type'   => 'text',
                'display_name'  => 'Email Us',
                'group'  => 'support',
                'details' => null,
                'status' => 1,
                'language_id' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'key'    => 'support_phone',
                'value'  => '+ 91 1234567890',
                'type'   => 'text',
                'display_name'  => 'Call Us',
                'group'  => 'support',
                'details' => null,
                'status' => 1,
                'language_id' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],

            // banner start
            // [
            //
            //     'key'    => 'banner_title',
            //     'value'  => 'Traders Wanted accelerated trader funding',
            //     'type'   => 'text',
            //     'display_name'  => 'Banner Title',
            //     'group'  => 'banner',
            //     'details' => null,
            //     'status' => 1,
            //     'language_id' => null,
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //     'created_by' => 1,
            // ],
            // [
            //
            //     'key'    => 'banner_description',
            //     'value'  => 'Capitalize on your trading skills and amplify your returns with a funded trader account you keep up to 90% of the profits.',
            //     'type'   => 'textarea',
            //     'display_name'  => 'Description',
            //     'group'  => 'banner',
            //     'details' => null,
            //     'status' => 1,
            //     'language_id' => null,
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //     'created_by' => 1,
            // ],
            // [
            //
            //     'key'    => 'banner_button1',
            //     'value'  => 'Start Trading',
            //     'type'   => 'text',
            //     'display_name'  => 'Banner Button 1',
            //     'group'  => 'banner',
            //     'details' => null,
            //     'status' => 1,
            //     'language_id' => null,
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //     'created_by' => 1,
            // ],
            // [
            //
            //     'key'    => 'banner_button2',
            //     'value'  => 'Learn More',
            //     'type'   => 'text',
            //     'display_name'  => 'Banner Button 2',
            //     'group'  => 'banner',
            //     'details' => null,
            //     'status' => 1,
            // 'language_id' => null,
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //     'created_by' => 1,
            // ],
            // banner end

            // tradable assets
            [
                'key'    => 'microsoft_link',
                'value'  => '',
                'type'   => 'text',
                'display_name'  => 'Microsoft Link',
                'group'  => 'tradable_asset',
                'details' => null,
                'status' => 1,
                'language_id' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'key'    => 'website_link',
                'value'  => '',
                'type'   => 'text',
                'display_name'  => 'Website Link',
                'group'  => 'tradable_asset',
                'details' => null,
                'status' => 1,
                'language_id' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'key'    => 'apple_link',
                'value'  => '',
                'type'   => 'text',
                'display_name'  => 'Apple Link',
                'group'  => 'tradable_asset',
                'details' => null,
                'status' => 1,
                'language_id' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],
            [
                'key'    => 'android_link',
                'value'  => '',
                'type'   => 'text',
                'display_name'  => 'Android Link',
                'group'  => 'tradable_asset',
                'details' => null,
                'status' => 1,
                'language_id' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
            ],


        ];

        SiteSetting::insert($site_settings);
    }
}
