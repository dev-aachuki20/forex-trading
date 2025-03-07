<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pages')->truncate();

        $banner = [
            [
                'page_key'       => 'home',
                'title'          => 'Traders Wanted accelerated trader funding',
                'sub_title'      =>  'Capitalize on your trading skills and amplify your returns with a funded trader account you keep up to 90% of the profits.',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'home',
                'title'          => 'トレーダーズ・ウォンテッドによるトレーダーの資金調達の促進',
                'sub_title'      =>  '利益の最大 90% を保持する資金提供トレーダー アカウントで、トレーディング スキルを活用し、収益を拡大しましょう。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'home',
                'title'          => 'ผู้ค้าต้องการเงินทุนสำหรับผู้ค้าแบบเร่ง',
                'sub_title'      => 'ใช้ประโยชน์จากทักษะการซื้อขายของคุณและเพิ่มผลตอบแทนของคุณด้วยบัญชีเทรดเดอร์ที่ได้รับเงินทุน ซึ่งคุณสามารถเก็บผลกำไรได้มากถึง 90%',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],



            [
                'page_key'       => 'get-funded',
                'title'          => 'Get Funded - Trading Account Options',
                'sub_title'      => 'Choose the account tier that works for you and start earning more on your trading activity.',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'get-funded',
                'title'          => '資金を得る - 取引口座オプション',
                'sub_title'      => '自分に合ったアカウント層を選択し、取引活動でより多くの収益を上げ始めましょう。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'get-funded',
                'title'          => 'รับเงินทุน - ตัวเลือกบัญชีซื้อขาย',
                'sub_title'      => 'เลือกระดับบัญชีที่เหมาะกับคุณและเริ่มสร้างรายได้มากขึ้นจากกิจกรรมการซื้อขายของคุณ',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],



            [
                'page_key'       => 'surge-trader-audition',
                'title'          => 'Forex Trader Audition',
                'sub_title'      => 'Simple, straightforward trading rules. No minimum trading days. No 30-day wait. Pass and you’re in.',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'surge-trader-audition',
                'title'          => '資金を得る - 取引口座オプション',
                'sub_title'      => 'シンプルでわかりやすい取引ルール。最低取引日数はありません。 30日間待つ必要はありません。通過すれば入場完了です。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'surge-trader-audition',
                'title'          => 'ออดิชั่นผู้ซื้อขาย Forex',
                'sub_title'      => 'กฎการซื้อขายที่เรียบง่ายและตรงไปตรงมา ไม่มีจำนวนวันซื้อขายขั้นต่ำ ไม่ต้องรอ 30 วัน ผ่านและคุณเข้า',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            [
                'page_key'       => 'scaling-plan',
                'title'          => 'Scaling Plan',
                'sub_title'      => 'Traders can scale up to the next largest account size and earn at least 2x more buying power all the way from a $25K account up to a $1 million account.',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'scaling-plan',
                'title'          => 'スケーリング計画',
                'sub_title'      => 'トレーダーは次に大きな口座サイズまでスケールアップでき、25,000 ドルの口座から最大 100 万ドルの口座まで少なくとも 2 倍以上の購買力を獲得できます。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'scaling-plan',
                'title'          => 'แผนการปรับขนาด',
                'sub_title'      => 'นักเทรดสามารถขยายขนาดบัญชีให้ใหญ่เป็นอันดับถัดไป และได้รับกำลังซื้อเพิ่มขึ้นอย่างน้อย 2 เท่า ตั้งแต่บัญชี $25K ไปจนถึงบัญชี $1 ล้าน',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],


            [
                'page_key'       => 'trading-rules',
                'title'          => 'Trading Rules & Account Limits',
                'sub_title'      => 'Focus on making profit — not on complying with a long list of trading rules.',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'trading-rules',
                'title'          => '取引ルールと口座制限',
                'sub_title'      => '膨大な取引ルールのリストに従うことではなく、利益を上げることに集中してください。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'trading-rules',
                'title'          => 'กฎการซื้อขายและขีดจำกัดบัญชี',
                'sub_title'      => 'มุ่งเน้นไปที่การทำกำไร — ไม่ต้องปฏิบัติตามกฎการซื้อขายที่มีมากมาย',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            [
                'page_key'       => 'tradable-assets',
                'title'          => 'What Assets Can I Trade?',
                'sub_title'      => 'From FX to cryptocurrency to indices, SurgeTrader offers a wide variety of tradable assets & instruments.',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'tradable-assets',
                'title'          => 'どのような資産を取引できますか?',
                'sub_title'      => 'FX から暗号通貨、インデックスまで、SurgeTrader は幅広い取引可能な資産や商品を提供しています。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'tradable-assets',
                'title'          => 'ฉันสามารถซื้อขายสินทรัพย์ใดได้บ้าง?',
                'sub_title'      => 'ตั้งแต่ FX ไปจนถึงสกุลเงินดิจิตอลไปจนถึงดัชนี SurgeTrader นำเสนอสินทรัพย์และตราสารที่สามารถซื้อขายได้หลากหลาย',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            [
                'page_key'       => 'technology',
                'title'          => 'Feel the Surge',
                'sub_title'      => 'Easy-to-use proprietary trading dashboards give you the tools you need to trade with best practices.',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'technology',
                'title'          => 'うねりを感じてください',
                'sub_title'      => '使いやすい独自の取引ダッシュボードは、ベストプラクティスに基づいて取引するために必要なツールを提供します。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'technology',
                'title'          => 'รู้สึกถึงไฟกระชาก',
                'sub_title'      => 'แดชบอร์ดการซื้อขายที่เป็นกรรมสิทธิ์ที่ใช้งานง่ายมอบเครื่องมือที่จำเป็นในการซื้อขายด้วยแนวปฏิบัติที่ดีที่สุด',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            [
                'page_key'       => 'faq',
                'title'          => 'FAQ',
                'sub_title'      => 'Find the answers to all of your questions about the SurgeTrader funded trader program.',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'faq',
                'title'          => 'よくある質問',
                'sub_title'      => 'SurgeTrader 資金提供トレーダー プログラムに関するすべての質問への答えを見つけてください。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'faq',
                'title'          => 'คำถามที่พบบ่อย',
                'sub_title'      => 'ค้นหาคำตอบของทุกคำถามของคุณเกี่ยวกับโปรแกรมเทรดเดอร์ที่ได้รับทุนสนับสนุนจาก SurgeTrader',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            [
                'page_key'       => 'affiliate',
                'title'          => 'Affiliate Program and Referrals',
                'sub_title'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'affiliate',
                'title'          => 'アフィリエイト プログラムと紹介',
                'sub_title'      => 'Lorem Ipsum は単なる印刷のダミー テキストであり、',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'affiliate',
                'title'          => 'โปรแกรมพันธมิตรและการอ้างอิง',
                'sub_title'      => 'Lorem Ipsum เป็นเพียงข้อความจำลองในการพิมพ์และ',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            [
                'page_key'       => 'our-founder',
                'title'          => 'Meet Our Founder',
                'sub_title'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'our-founder',
                'title'          => '当社の創設者を紹介します',
                'sub_title'      => 'Lorem Ipsum は単なる印刷のダミー テキストであり、',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'our-founder',
                'title'          => 'พบกับผู้ก่อตั้งของเรา',
                'sub_title'      => 'Lorem Ipsum เป็นเพียงข้อความจำลองในการพิมพ์และ',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            [
                'page_key'       => 'surgetrader-team',
                'title'          => 'Our Team',
                'sub_title'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'surgetrader-team',
                'title'          => '私たちのチーム',
                'sub_title'      => 'Lorem Ipsum は単なる印刷のダミー テキストであり、',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'surgetrader-team',
                'title'          => 'ทีมงานของเรา',
                'sub_title'      => 'Lorem Ipsum เป็นเพียงข้อความจำลองในการพิมพ์และ',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            [
                'page_key'       => 'about-surgetrader',
                'title'          => 'About Us',
                'sub_title'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'about-surgetrader',
                'title'          => '私たちについて',
                'sub_title'      => 'Lorem Ipsum は単なる印刷のダミー テキストであり、',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'about-surgetrader',
                'title'          => 'เกี่ยวกับเรา',
                'sub_title'      => 'Lorem Ipsum เป็นเพียงข้อความจำลองในการพิมพ์และ',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            [
                'page_key'       => 'contact-us',
                'title'          => 'We’re Here to Help You',
                'sub_title'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'contact-us',
                'title'          => '私たちはあなたをお手伝いします',
                'sub_title'      => 'Lorem Ipsum は単なる印刷のダミー テキストであり、',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'contact-us',
                'title'          => 'เราพร้อมช่วยเหลือคุณ',
                'sub_title'      => 'Lorem Ipsum เป็นเพียงข้อความจำลองในการพิมพ์และ',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],




            [
                'page_key'       => 'bk-forex-membership',
                'title'          => 'BKForex Membership',
                'sub_title'      => 'Trading experts Boris Schlossberg & Kathy Lien have chosen SurgeTrader as their preferred prop trading partner. All traders receive a complimentary 30-day membership with BKForex which includes live trade ideas, a 24/7 trader chatroom, exclusive SurgeTrader webinar… and much more.',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'bk-forex-membership',
                'title'          => 'BKForex メンバーシップ',
                'sub_title'      => 'トレーディング専門家のボリス・シュロスバーグ氏とキャシー・リアン氏は、プロップ取引の優先パートナーとしてサージトレーダーを選びました。すべてのトレーダーは、ライブトレードのアイデア、年中無休のトレーダーチャットルーム、SurgeTrader 限定ウェビナーなどが含まれる BKForex の 30 日間無料メンバーシップを受け取ります。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'bk-forex-membership',
                'title'          => 'สมาชิก BKForex',
                'sub_title'      => 'ผู้เชี่ยวชาญด้านการซื้อขาย Boris Schlossberg และ Kathy Lien ได้เลือก SurgeTrader เป็นหุ้นส่วนการซื้อขายอุปกรณ์ประกอบฉากที่พวกเขาต้องการ เทรดเดอร์ทุกคนจะได้รับสิทธิ์เป็นสมาชิกฟรี 30 วันกับ BKForex ซึ่งรวมถึงแนวคิดการเทรดแบบสด ห้องสนทนาสำหรับเทรดเดอร์ตลอด 24 ชั่วโมงทุกวัน การสัมมนาผ่านเว็บพิเศษของ SurgeTrader... และอื่นๆ อีกมากมาย',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            [
                'page_key'       => 'news',
                'title'          => 'News Releases',
                'sub_title'      => 'Official announcements highlighting recent SurgeTrader company news regarding philanthropy, program updates, partnerships and other newsworthy announcements.',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'news',
                'title'          => 'ニュースリリース',
                'sub_title'      => '慈善活動、プログラムの更新、パートナーシップ、その他のニュース価値のある発表に関する最近の SurgeTrader 企業ニュースを紹介する公式発表。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'news',
                'title'          => 'ข่าวประชาสัมพันธ์',
                'sub_title'      => 'ประกาศอย่างเป็นทางการที่เน้นข่าวล่าสุดของบริษัท SurgeTrader เกี่ยวกับการทำบุญ การอัปเดตโปรแกรม ความร่วมมือ และประกาศที่น่าสนใจอื่น ๆ',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            [
                'page_key'       => 'trading-contest',
                'title'          => 'Trading Contest',
                'sub_title'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'trading-contest',
                'title'          => 'トレーディングコンテスト',
                'sub_title'      => 'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。ローレム・イプサムは',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'trading-contest',
                'title'          => 'ทอมมี่คอนนิสตอต',
                'sub_title'      => 'Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum มาแล้ว',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            [
                'page_key'       => 'traders-resources',
                'title'          => 'Trader Resources',
                'sub_title'      => 'Find a wealth of information for traders — from strategy to risk management to technical analysis and everything in between.',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'traders-resources',
                'title'          => 'トレーダーのリソース',
                'sub_title'      => '戦略からリスク管理、テクニカル分析、そしてその間のあらゆるものまで、トレーダー向けの豊富な情報を見つけてください。
                ',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'traders-resources',
                'title'          => 'แหล่งข้อมูลสำหรับเทรดเดอร์',
                'sub_title'      => 'ค้นหาข้อมูลมากมายสำหรับเทรดเดอร์ — ตั้งแต่กลยุทธ์ไปจนถึงการบริหารความเสี่ยงไปจนถึงการวิเคราะห์ทางเทคนิคและทุกสิ่งในระหว่างนั้น',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            [
                'page_key'       => 'traders-corner-blog',
                'title'          => "The Trader's Corner Blog",
                'sub_title'      => 'Find helpful tips and information from the world of trading — technical analysis, fundamental analysis, market outlooks and more.',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'traders-corner-blog',
                'title'          => 'トレーダーズコーナーのブログ',
                'sub_title'      => 'テクニカル分析、ファンダメンタルズ分析、市場見通しなど、トレーディングの世界から役立つヒントや情報を見つけてください。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'traders-corner-blog',
                'title'          => 'บล็อกมุมของเทรดเดอร์
                ',
                'sub_title'      => 'ค้นหาเคล็ดลับและข้อมูลที่เป็นประโยชน์จากโลกแห่งการซื้อขาย — การวิเคราะห์ทางเทคนิค การวิเคราะห์ปัจจัยพื้นฐาน แนวโน้มตลาด และอื่นๆ',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            [
                'page_key'       => 'learn-forex-trading',
                'title'          => "What is Forex?",
                'sub_title'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'learn-forex-trading',
                'title'          => '外国為替とは何ですか?',
                'sub_title'      => 'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。ローレム・イプサムは',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'learn-forex-trading',
                'title'          => 'ฟอเร็กซ์คืออะไร?
                ',
                'sub_title'      => 'Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum มาแล้ว',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            [
                'page_key'       => 'blogs-slug',
                'title'          => "Blog Details",
                'sub_title'      => '',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'blogs-slug',
                'title'          => 'ブログの詳細?',
                'sub_title'      => '',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'blogs-slug',
                'title'          => 'รายละเอียดบล็อก',
                'sub_title'      => '',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            [
                'page_key'       => 'news-slug',
                'title'          => "News Details",
                'sub_title'      => '',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'news-slug',
                'title'          => 'ニュース詳細',
                'sub_title'      => '',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'news-slug',
                'title'          => 'รายละเอียดข่าว',
                'sub_title'      => '',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            
            [
                'page_key'       => 'cookies-policy',
                'title'          => "Cookies Policy",
                'sub_title'      => '',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'cookies-policy',
                'title'          => 'クッキーポリシー',
                'sub_title'      => '',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'cookies-policy',
                'title'          => 'นโยบายคุกกี้',
                'sub_title'      => '',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            
            [
                'page_key'       => 'terms-conditions',
                'title'          => "Terms & Conditions",
                'sub_title'      => '',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'terms-conditions',
                'title'          => '利用規約',
                'sub_title'      => '',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'terms-conditions',
                'title'          => 'ข้อกำหนดและเงื่อนไข',
                'sub_title'      => '',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            [
                'page_key'       => 'affiliate-agreement',
                'title'          => "Affiliate Agreement",
                'sub_title'      => '',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'affiliate-agreement',
                'title'          => 'アフィリエイト契約',
                'sub_title'      => '',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'affiliate-agreement',
                'title'          => 'ข้อตกลงพันธมิตร',
                'sub_title'      => '',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            [
                'page_key'       => 'privacy-policy',
                'title'          => "Privacy Policy",
                'sub_title'      => '',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'privacy-policy',
                'title'          => 'プライバシーポリシー',
                'sub_title'      => '',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'page_key'       => 'privacy-policy',
                'title'          => 'นโยบายความเป็นส่วนตัว',
                'sub_title'      => '',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],



        ];
        Page::insert($banner);
    }
}
