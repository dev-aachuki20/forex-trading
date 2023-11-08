<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FaqType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class FaqTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faq_types')->truncate();

        // $faqTypes = [
        //     [
        //         'title_en'       => 'new to surgetrader',
        //         'title_ja'       => 'サージトレーダーの初心者',
        //         'title_th'       => 'ใหม่สำหรับศัลยแพทย์',
        //         'created_at'     => date('Y-m-d H:i:s'),
        //         'updated_at'     => date('Y-m-d H:i:s'),
        //     ],
        //     [
        //         'title_en'       => 'audition process',
        //         'title_ja'       => 'オーディションの流れ',
        //         'title_th'       => 'กระบวนการออดิชั่น',
        //         'created_at'     => date('Y-m-d H:i:s'),
        //         'updated_at'     => date('Y-m-d H:i:s'),
        //     ],
        //     [
        //         'title_en'       => 'trading rules',
        //         'title_ja'       => '取引ルール',
        //         'title_th'       => 'กฎการซื้อขาย',
        //         'created_at'     => date('Y-m-d H:i:s'),
        //         'updated_at'     => date('Y-m-d H:i:s'),
        //     ],

        //     [
        //         'title_en'       => 'funded accounts',
        //         'title_ja'       => '資金提供されたアカウント',
        //         'title_th'       => 'บัญชีที่ได้รับทุน',
        //         'created_at'     => date('Y-m-d H:i:s'),
        //         'updated_at'     => date('Y-m-d H:i:s'),
        //     ],

        //     [
        //         'title_en'       => 'platform & dashboard',
        //         'title_ja'       => 'プラットフォームとダッシュボード',
        //         'title_th'       => 'แพลตฟอร์มและแดชบอร์ด',
        //         'created_at'     => date('Y-m-d H:i:s'),
        //         'updated_at'     => date('Y-m-d H:i:s'),
        //     ],

        //     [
        //         'title_en'       => 'order & billing',
        //         'title_ja'       => '注文と請求',
        //         'title_th'       => 'การสั่งซื้อและการเรียกเก็บเงิน',
        //         'created_at'     => date('Y-m-d H:i:s'),
        //         'updated_at'     => date('Y-m-d H:i:s'),
        //     ],

        //     [
        //         'title_en'       => 'affiliate faq',
        //         'title_ja'       => 'アフィリエイトに関するよくある質問',
        //         'title_th'       => 'คำถามที่พบบ่อยเกี่ยวกับพันธมิตร',
        //         'created_at'     => date('Y-m-d H:i:s'),
        //         'updated_at'     => date('Y-m-d H:i:s'),
        //     ],
          
        // ];

        $faqTypes = [
            [
                'title'       => json_encode([
                    'en'=>'new to surgetrader',
                    'ja'=>'サージトレーダーの初心者',
                    'th'=>'ใหม่สำหรับศัลยแพทย์',
                ]),
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'title'       => json_encode([
                    'en'=>'audition process',
                    'ja'=>'オーディションの流れ',
                    'th'=>'กระบวนการออดิชั่น',
                ]),
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'title'       => json_encode([
                    'en'       => 'trading rules',
                    'ja'       => '取引ルール',
                    'th'       => 'กฎการซื้อขาย',
                ]),
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            [
                'title'       => json_encode([
                    'en'       => 'funded accounts',
                    'ja'       => '資金提供されたアカウント',
                    'th'       => 'บัญชีที่ได้รับทุน',
                ]),
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            [
                'title'       => json_encode([
                    'en'       => 'platform & dashboard',
                    'ja'       => 'プラットフォームとダッシュボード',
                    'th'       => 'แพลตฟอร์มและแดชบอร์ด',
                ]),
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            [
                'title'       => json_encode([
                    'en'       => 'order & billing',
                    'ja'       => '注文と請求',
                    'th'       => 'การสั่งซื้อและการเรียกเก็บเงิน',
                ]),
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            [
                'title'       => json_encode([
                    'en'       => 'affiliate faq',
                    'ja'       => 'アフィリエイトに関するよくある質問',
                    'th'       => 'คำถามที่พบบ่อยเกี่ยวกับพันธมิตร',
                ]),
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
          
        ];
      
        FaqType::insert($faqTypes);
    }
}
