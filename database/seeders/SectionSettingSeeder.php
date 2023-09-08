<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->truncate();
        $sections = [
            // package
            [
                'section_key'    => 'package',
                'title'          => 'Our Packages',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",
                'button_one'     =>  '',
                'button_two'     =>  '',
                'link_one'       =>  '',
                'link_two'       =>  '',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'package',
                'title'          => '当社のパッケージ',
                'description'    =>  "Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum はこれまで業界の標準的なダミー テキストでした",
                'button_one'     =>  '',
                'button_two'     =>  '',
                'link_one'       =>  '',
                'link_two'       =>  '',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'package',
                'title'          => 'แพ็คเกจของเรา',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมเลยทีเดียว",
                'button_one'     =>  '',
                'button_two'     =>  '',
                'link_one'       =>  '',
                'link_two'       =>  '',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],


            // How does our company works
            [
                'section_key'    => 'our-company-works',
                'title'          => 'How does our company works',
                'description'    =>  "Take a one-step Audition, and once you achieve a 10% profit target, you receive a funded account — up to $1 million. You keep up to 90% of your profits. Simple rules. No time limits. Great customer service.",
                'button_one'     =>  '',
                'button_two'     =>  '',
                'link_one'       =>  '',
                'link_two'       =>  '',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'our-company-works',
                'title'          => '私たちの会社の仕組み',
                'description'    =>  "ワンステップ オーディションに参加し、10% の利益目標を達成すると、最大 100 万ドルの資金が付与されたアカウントを受け取ります。利益の最大 90% を保持します。シンプルなルール。時間制限はありません。素晴らしい顧客サービス。",
                'button_one'     =>  '',
                'button_two'     =>  '',
                'link_one'       =>  '',
                'link_two'       =>  '',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'our-company-works',
                'title'          => 'บริษัทของเราทำงานอย่างไร',
                'description'    =>  "ทำออดิชั่นขั้นตอนเดียว และเมื่อคุณบรรลุเป้าหมายกำไร 10% แล้ว คุณจะได้รับบัญชีที่มีเงินทุน — สูงถึง 1 ล้านดอลลาร์ คุณสามารถเก็บผลกำไรได้มากถึง 90% กฎง่ายๆ ไม่มีการจำกัดเวลา การบริการลูกค้าที่ดีเยี่ยม",
                'button_one'     =>  '',
                'button_two'     =>  '',
                'link_one'       =>  '',
                'link_two'       =>  '',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // as seen on
            [
                'section_key'    => 'as-seen-on',
                'title'          => 'As Seen on',
                'description'    =>  "",
                'button_one'     =>  '',
                'button_two'     =>  '',
                'link_one'       =>  '',
                'link_two'       =>  '',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'as-seen-on',
                'title'          => 'で見られるように',
                'description'    =>  "",
                'button_one'     =>  '',
                'button_two'     =>  '',
                'link_one'       =>  '',
                'link_two'       =>  '',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'as-seen-on',
                'title'          => 'เท่าที่เห็น',
                'description'    =>  "",
                'button_one'     =>  '',
                'button_two'     =>  '',
                'link_one'       =>  '',
                'link_two'       =>  '',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // over the weekend 
            [
                'section_key'    => 'over-the-weekend',
                'title'          => 'Hold Trades Over The Weekend',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",
                'button_one'     =>  'Start Trading',
                'button_two'     =>  '',
                'link_one'       =>  '',
                'link_two'       =>  '',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'over-the-weekend',
                'title'          => '週末に取引を保留する',
                'description'    =>  "Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum はこれまで業界の標準的なダミー テキストでした",
                'button_one'     =>  '取引を開始する',
                'button_two'     =>  '',
                'link_one'       =>  '',
                'link_two'       =>  '',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'over-the-weekend',
                'title'          => 'ถือการซื้อขายในช่วงสุดสัปดาห์',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมเลยทีเดียว",
                'button_one'     =>  'เริ่มต้นการซื้อขาย',
                'button_two'     =>  '',
                'link_one'       =>  '',
                'link_two'       =>  '',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // over the weekend  two
            [
                'section_key'    => 'over-the-weekend-two',
                'title'          => 'Hold Trades Over The Weekend',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",
                'button_one'     =>  'Start Trading',
                'button_two'     =>  '',
                'link_one'       =>  '',
                'link_two'       =>  '',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'over-the-weekend-two',
                'title'          => '週末に取引を保留する',
                'description'    =>  "Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum はこれまで業界の標準的なダミー テキストでした",
                'button_one'     =>  '取引を開始する',
                'button_two'     =>  '',
                'link_one'       =>  '',
                'link_two'       =>  '',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'over-the-weekend-two',
                'title'          => 'ถือการซื้อขายในช่วงสุดสัปดาห์',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมเลยทีเดียว",
                'button_one'     =>  'เริ่มต้นการซื้อขาย',
                'button_two'     =>  '',
                'link_one'       =>  '',
                'link_two'       =>  '',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // audition step one
            [
                'section_key'    => 'forex-trader-audition-step-one',
                'title'          => 'Step',
                'description'    =>  '<h4>ForexTrader Audition</h4>
                <div class="step-details-dis">
                    <p>Choose your tier and take our SurgeTrader Audition. Follow risk management rules
                        and achieve appropriate targets using whichever trading style you like. No
                        limits on instruments. No minimum trading days. No 30-day mandatory trading
                        period.</p>
                </div>',
                'button_one'     =>  '',
                'button_two'     =>  '',
                'link_one'       =>  '',
                'link_two'       =>  '',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'forex-trader-audition-step-one',
                'title'          => 'ステップ',
                'description'    =>  '<h4>ForexTrader オーディション</h4>
                <div class="step-details-dis">
                    <p>レベルを選択して、SurgeTrader オーディションを受けてください。リスク管理ルールを遵守する
                    好みの取引スタイルを使用して適切な目標を達成します。いいえ
                    楽器の限界。最低取引日数はありません。 30日間の強制取引なし
                    期間。</p>
                </div>',
                'button_one'     =>  '',
                'button_two'     =>  '',
                'link_one'       =>  '',
                'link_two'       =>  '',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'forex-trader-audition-step-one',
                'title'          => 'ขั้นตอน',
                'description'    =>  '<h4>ออดิชั่น ForexTrader</h4>
                <div class="step-details-dis">
                    <p>เลือกระดับของคุณและเข้าร่วม SurgeTrader Audition ของเรา ปฏิบัติตามกฎการบริหารความเสี่ยง
                    และบรรลุเป้าหมายที่เหมาะสมโดยใช้รูปแบบการซื้อขายที่คุณชอบ เลขที่
                    ข้อจำกัดของเครื่องมือ ไม่มีจำนวนวันซื้อขายขั้นต่ำ ไม่มีการซื้อขายบังคับ 30 วัน
                    ระยะเวลา.</p>
                </div>',
                'button_one'     =>  '',
                'button_two'     =>  '',
                'link_one'       =>  '',
                'link_two'       =>  '',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // funded step two
            [
                'section_key'    => 'forex-trader-audition-step-two',
                'title'          => 'Step',
                'description'    =>  '<h4>ForexTrader Funded Account</h4>
                <div class="step-details-dis">
                    <p>You made it! Now you can utilize your trading discipline with our capital. Trade
                        consistently and responsibly to earn real money — up to 90% of your profits.</p>
                </div>',
                'button_one'     =>  '',
                'button_two'     =>  '',
                'link_one'       =>  '',
                'link_two'       =>  '',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'forex-trader-audition-step-two',
                'title'          => 'ステップ',
                'description'    =>  '<h4>ForexTrader 資金提供アカウント</h4>
                <div class="step-details-dis">
                    <p>やった！これで、当社の資本を活用して取引規律を活用できるようになります。貿易
                    継続的かつ責任を持って実際のお金（利益の最大 90%）を稼ぎます。</p>
                </div>',
                'button_one'     =>  '',
                'button_two'     =>  '',
                'link_one'       =>  '',
                'link_two'       =>  '',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'forex-trader-audition-step-two',
                'title'          => 'ขั้นตอน',
                'description'    => '<h4>บัญชีที่ได้รับทุนจาก ForexTrader</h4>
                <div class="step-details-dis">
                    <p>คุณทำมัน! ตอนนี้คุณสามารถใช้ระเบียบวินัยในการซื้อขายของคุณกับเงินทุนของเราได้แล้ว ซื้อขาย
                    อย่างต่อเนื่องและมีความรับผิดชอบเพื่อรับเงินจริง — มากถึง 90% ของกำไรของคุณ</p>
                </div>',
                'button_one'     =>  '',
                'button_two'     =>  '',
                'link_one'       =>  '',
                'link_two'       =>  '',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],


        ];

        Setting::insert($sections);
    }
}
