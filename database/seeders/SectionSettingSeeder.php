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
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'package',
                'title'          => '当社のパッケージ',
                'description'    =>  "Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum はこれまで業界の標準的なダミー テキストでした",
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'package',
                'title'          => 'แพ็คเกจของเรา',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมเลยทีเดียว",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],


            // How does our company works
            [
                'section_key'    => 'our-company-works',
                'title'          => 'How does our company works',
                'description'    =>  "Take a one-step Audition, and once you achieve a 10% profit target, you receive a funded account — up to $1 million. You keep up to 90% of your profits. Simple rules. No time limits. Great customer service.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'our-company-works',
                'title'          => '私たちの会社の仕組み',
                'description'    =>  "ワンステップ オーディションに参加し、10% の利益目標を達成すると、最大 100 万ドルの資金が付与されたアカウントを受け取ります。利益の最大 90% を保持します。シンプルなルール。時間制限はありません。素晴らしい顧客サービス。",
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'our-company-works',
                'title'          => 'บริษัทของเราทำงานอย่างไร',
                'description'    =>  "ทำออดิชั่นขั้นตอนเดียว และเมื่อคุณบรรลุเป้าหมายกำไร 10% แล้ว คุณจะได้รับบัญชีที่มีเงินทุน — สูงถึง 1 ล้านดอลลาร์ คุณสามารถเก็บผลกำไรได้มากถึง 90% กฎง่ายๆ ไม่มีการจำกัดเวลา การบริการลูกค้าที่ดีเยี่ยม",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // as seen on
            [
                'section_key'    => 'as-seen-on',
                'title'          => 'As Seen on',
                'description'    =>  "",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'as-seen-on',
                'title'          => 'で見られるように',
                'description'    =>  "",
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'as-seen-on',
                'title'          => 'เท่าที่เห็น',
                'description'    =>  "",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // over the weekend 
            [
                'section_key'    => 'over-the-weekend',
                'title'          => 'Hold Trades Over The Weekend',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'over-the-weekend',
                'title'          => '週末に取引を保留する',
                'description'    =>  "Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum はこれまで業界の標準的なダミー テキストでした",
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'over-the-weekend',
                'title'          => 'ถือการซื้อขายในช่วงสุดสัปดาห์',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมเลยทีเดียว",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // over the weekend  two
            [
                'section_key'    => 'over-the-weekend-two',
                'title'          => 'Hold Trades Over The Weekend',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'over-the-weekend-two',
                'title'          => '週末に取引を保留する',
                'description'    =>  "Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum はこれまで業界の標準的なダミー テキストでした",
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'over-the-weekend-two',
                'title'          => 'ถือการซื้อขายในช่วงสุดสัปดาห์',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมเลยทีเดียว",
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
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // we different
            [
                'section_key'    => 'why-we-different',
                'title'          => 'Why We Are Different',
                'description'    =>  '<div class="discription"><p>One-stage assessment with simple, straightforward trading rules.</p></div><ul><li><a href="#"><div class="icon"><img src="images/icons/timerpause.svg" alt="timerpause"></div><div class="icon-text">No Time Limits</div></a></li><li><a href="#"><div class="icon"><img src="images/icons/stickynote.svg" alt="stickynote"></div><div class="icon-text">Simple Rules</div></a></li><li><a href="#"><div class="icon"><img src="images/icons/usertick.svg" alt="usertick"></div><div class="icon-text">One-Time Investment In Yourself</div></a></li></ul><div class="discription"><p>Choose your tier and take the SurgeTrader Audition. The trading rules are simple and straightforward — not a complicated list with dozens of rules you need to comply with.</p></div>',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            [
                'section_key'    => 'why-we-different',
                'title'          => 'なぜ私たちは違うのか',
                'description'    =>  '<div class="discription">
                <p>シンプルでわかりやすい取引ルールによる1段階評価。</p>
            </div>
            <ul>
                <li>
                    <a href="#">
                        <div class="icon">
                            <img src="images/icons/timerpause.svg" alt="timerpause">
                        </div>
                        <div class="icon-text">時間制限なし</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="icon">
                            <img src="images/icons/stickynote.svg" alt="stickynote">
                        </div>
                        <div class="icon-text">簡単なルール</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="icon">
                            <img src="images/icons/usertick.svg" alt="usertick">
                        </div>
                        <div class="icon-text">自分自身への一度限りの投資</div>
                    </a>
                </li>
            </ul>
            <div class="discription">
                <p>レベルを選択して、SurgeTrader Audition に参加してください。取引ルールはシンプルで、単純です。遵守する必要がある多数のルールが含まれる複雑なリストではありません。</p>
            </div>',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'why-we-different',
                'title'          => 'ทำไมเราถึงแตกต่าง',
                'description'    => '<div class="discription">
                <p>シンプルでわかりやすい取引ルールによる1段階評価。</p>
            </div>
            <ul>
                <li>
                    <a href="#">
                        <div class="icon">
                            <img src="images/icons/timerpause.svg" alt="timerpause">
                        </div>
                        <div class="icon-text">時間制限なし</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="icon">
                            <img src="images/icons/stickynote.svg" alt="stickynote">
                        </div>
                        <div class="icon-text">簡単なルール</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="icon">
                            <img src="images/icons/usertick.svg" alt="usertick">
                        </div>
                        <div class="icon-text">自分自身への一度限りの投資
                        </div>
                    </a>
                </li>
            </ul>
            <div class="discription">
                <p>レベルを選択して、SurgeTrader Audition に参加してください。取引ルールはシンプルで、
                単純です。遵守する必要がある多数のルールが含まれる複雑なリストではありません。</p>
            </div>',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],


            // trader portal
            [
                'section_key'    => 'trader-portal',
                'title'          => 'Trader Portal',
                'description'    =>  "We know that good traders are addicted to numbers. With our platform, you can track all your trading activity through our user-friendly trader portal. Everything you need on a simple-to-use dashboard.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'trader-portal',
                'title'          => 'トレーダーポータル',
                'description'    =>  "優れたトレーダーは数字に執着していることを私たちは知っています。当社のプラットフォームを使用すると、ユーザーフレンドリーなトレーダーポータルを通じてすべての取引活動を追跡できます。必要なものはすべて使いやすいダッシュボードにあります。",
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'trader-portal',
                'title'          => 'พอร์ทัลผู้ค้า',
                'description'    =>  "เรารู้ว่าเทรดเดอร์ที่ดีนั้นเสพติดตัวเลข ด้วยแพลตฟอร์มของเรา คุณสามารถติดตามกิจกรรมการซื้อขายทั้งหมดของคุณผ่านทางพอร์ทัลเทรดเดอร์ที่ใช้งานง่ายของเรา ทุกสิ่งที่คุณต้องการบนแดชบอร์ดที่ใช้งานง่าย",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // earn more 
            [
                'section_key'    => 'earn-more-trading-activity',
                'title'          => 'Earn More From Your Trading Activity',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'earn-more-trading-activity',
                'title'          => '取引活動からより多くの収益を得る',
                'description'    =>  "Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum は、1500 年代に無名の印刷業者が活字のゲラを奪い合って作成して以来、業界の標準的なダミー テキストです。",
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'earn-more-trading-activity',
                'title'          => 'หารายได้เพิ่มเติมจากกิจกรรมการซื้อขายของคุณ',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมนับตั้งแต่ช่วงปี 1500 เมื่อเครื่องพิมพ์ที่ไม่รู้จักใช้เครื่องพิมพ์ชนิดต่างๆ และคนให้เข้ากัน",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // trading rules 
            [
                'section_key'    => 'trading-rules',
                'title'          => 'Trading Rules & Account Limits',
                'description'    =>  "We help you focus on executing profitable trades by making the rules and account limits simple and straightforward.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'trading-rules',
                'title'          => '取引ルールと口座制限',
                'description'    =>  'ルールと口座制限をシンプルかつ簡単にすることで、お客様が収益性の高い取引の実行に集中できるよう支援します。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'trading-rules',
                'title'          => 'กฎการซื้อขายและขีดจำกัดบัญชี',
                'description'    =>  "เราช่วยให้คุณมุ่งเน้นไปที่การดำเนินการซื้อขายที่มีกำไรโดยการทำให้กฎและการจำกัดบัญชีเป็นเรื่องง่ายและตรงไปตรงมา",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],


            // Withdrawing Profits
            [
                'section_key'    => 'withdrawing-profits',
                'title'          => 'Withdrawing Profits',
                'description'    =>  "SurgeTraders can request a withdrawal of profits at any time, but no more frequently than every thirty days. When a withdrawal is requested, SurgeTrader will also withdraw its share of the profits and your new highwater equity will be marked down by the total amount of funds withdrawn.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'withdrawing-profits',
                'title'          => '利益の出金',
                'description'    =>  'SurgeTraders は、いつでも利益の出金を要求できますが、30 日ごとを超える頻度は要求できません。出金が要求されると、SurgeTrader は利益の一部も出金し、新しいハイウォーター株式は出金された資金の総額によって減額されます。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'withdrawing-profits',
                'title'          => 'การถอนกำไร',
                'description'    =>  "SurgeTraders สามารถขอถอนกำไรได้ตลอดเวลา แต่ต้องไม่บ่อยเกินทุกๆ สามสิบวัน เมื่อมีการร้องขอการถอน SurgeTrader จะถอนส่วนแบ่งกำไรออกด้วย และอิควิตี้ Highwater ใหม่ของคุณจะถูกทำเครื่องหมายลงด้วยจำนวนเงินทั้งหมดที่ถอนออก",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // profit
            [
                'section_key'    => 'profit',
                'title'          => 'Up to 90% Profit',
                'description'    =>  "You keep up to 90% of the profits you earn.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'profit',
                'title'          => '最大90%の利益',
                'description'    =>  '得た利益の最大 90% を保持します。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'profit',
                'title'          => 'กำไรมากถึง 90%',
                'description'    =>  "คุณสามารถเก็บผลกำไรได้มากถึง 90%",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // easy
            [
                'section_key'    => 'easy',
                'title'          => 'Easy',
                'description'    =>  "Withdraw your profits with a few clicks.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'easy',
                'title'          => '簡単',
                'description'    =>  '数回クリックするだけで利益を出金できます。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'easy',
                'title'          => 'ง่าย',
                'description'    =>  "ถอนกำไรของคุณด้วยการคลิกเพียงไม่กี่ครั้ง",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // fast
            [
                'section_key'    => 'fast',
                'title'          => 'Fast',
                'description'    =>  "Quick processing of profits into your account.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'fast',
                'title'          => '速い',
                'description'    =>  '利益をアカウントに迅速に処理します。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'fast',
                'title'          => 'เร็ว',
                'description'    =>  "ประมวลผลผลกำไรอย่างรวดเร็วเข้าสู่บัญชีของคุณ",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // support
            [
                'section_key'    => 'support',
                'title'          => 'Support',
                'description'    =>  "Responsive support to help with any issue or concern.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'support',
                'title'          => 'サポート',
                'description'    =>  'あらゆる問題や懸念事項に対応するサポート。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'support',
                'title'          => 'สนับสนุน',
                'description'    =>  "การสนับสนุนที่ตอบสนองเพื่อช่วยเหลือในทุกปัญหาหรือข้อกังวล",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // how it works
            [
                'section_key'    => 'how-it-works',
                'title'          => 'How It Works',
                'description'    =>  '<div class="discription mb-30">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been </p>
            </div>
            <div class="section-list">
                <ul>
                    <li>Scale up from $25K all the way to $1MM</li>
                    <li>No minimum trading days</li>
                    <li>No 30-day assessment period</li>
                </ul>
            </div>',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'how-it-works',
                'title'          => '使い方',
                'description'    =>  '<div class="discription mb-30">
                <p>Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。ローレム・イプサムは
                </p>
            </div>
            <div class="section-list">
                <ul>
                    <li>25,000 ドルから 100 万ドルまでスケールアップ</li>
                    <li>最低取引日数なし</li>
                    <li>30 日間の評価期間なし</li>
                </ul>
            </div>',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'how-it-works',
                'title'          => 'มันทำงานอย่างไร',
                'description'    =>  '<div class="discription mb-30">
                <p>Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum มาแล้ว
                </p>
            </div>
            <div class="section-list">
                <ul>
                    <li>เพิ่มขนาดจาก $25K ไปจนถึง $1MM</li>
                    <li>ไม่มีจำนวนวันซื้อขายขั้นต่ำ</li>
                    <li>ไม่มีระยะเวลาการประเมิน 30 วัน</li>
                </ul>
            </div>',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],


            // option one
            [
                'section_key'    => 'option-one',
                'title'          => 'option',
                'description'    =>  '<h4>Claim Your Fully Funded Account</h4>
                <div class="step-details-dis">
                    <p>Choose your tier and take our SurgeTrader Audition. Follow risk management
                        rules and achieve appropriate targets using whichever trading style you
                        like. No limits on instruments. No minimum trading days. No 30-day mandatory
                        trading period.</p>
                </div>',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'option-one',
                'title'          => 'オプション',
                'description'    =>  '<h4>全額入金されたアカウントを請求する
                </h4>
                <div class="step-details-dis">
                    <p>レベルを選択して、SurgeTrader オーディションを受けてください。リスク管理を遵守する
                    どのような取引スタイルであっても、ルールを定めて適切な目標を達成します。
                    のように。楽器に制限はありません。最低取引日数はありません。 30日間の義務なし
                    取引期間。</p>
                </div>',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'option-one',
                'title'          => 'สนับสนุน',
                'description'    =>  '<h4>อ้างสิทธิ์ในบัญชีที่ได้รับเงินทุนเต็มจำนวนของคุณ
                </h4>
                <div class="step-details-dis">
                    <p>
                    เลือกระดับของคุณและเข้าร่วม SurgeTrader Audition ของเรา ปฏิบัติตามกฎการบริหารความเสี่ยงและบรรลุเป้าหมายที่เหมาะสมโดยใช้รูปแบบการซื้อขายที่คุณต้องการ ไม่มีข้อจำกัดเกี่ยวกับเครื่องมือ ไม่มีจำนวนวันซื้อขายขั้นต่ำ ไม่มีระยะเวลาการซื้อขายบังคับ 30 วัน</p>
                </div>',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // option two
            [
                'section_key'    => 'option-two',
                'title'          => 'option',
                'description'    =>  '<h4>Scale Up Your Account</h4>
                <div class="step-details-dis">
                    <p>Scale your account to the next largest account size by earning an additional
                        10% of profit.</p>
                </div>',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'option-two',
                'title'          => 'オプション',
                'description'    =>  '<h4>アカウントをスケールアップする
                </h4>
                <div class="step-details-dis">
                    <p>さらに 10% の利益を獲得して、アカウントを次に大きいアカウント サイズに拡張します。</p>
                </div>',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'option-two',
                'title'          => 'สนับสนุน',
                'description'    =>  '<h4>ขยายขนาดบัญชีของคุณ</h4>
                <div class="step-details-dis">
                    <p>ปรับขนาดบัญชีของคุณเป็นขนาดบัญชีที่ใหญ่ที่สุดถัดไปโดยรับกำไรเพิ่มเติม 10%
                    </p>
                </div>',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],


            // tradable instruments
            [
                'section_key'    => 'tradable-instrument',
                'title'          => 'Tradable Instruments',
                'description'    =>  '<div class="discription">
                <p>Within the SurgeTrader program, a variety of instruments are available for you to trade, including FX, select equities, major stock market indices, oil, metals and cryptocurrencies.</p>
                <p>Traders have the option to trade on either of the most popular platforms which are offered through our partner broker EightCap.</p>
              </div>',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'tradable-instrument',
                'title'          => '取引可能な商品',
                'description'    =>  '<div class="discription">
                <p>SurgeTrader プログラム内では、FX、一部の株式、主要株価指数、石油、金属、暗号通貨など、さまざまな商品を取引できます。</p>
                <p>トレーダーは、当社のパートナーブローカー EightCap を通じて提供される最も人気のあるプラットフォームのいずれかで取引するオプションを選択できます。</p>
              </div>',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'tradable-instrument',
                'title'          => 'ตราสารที่สามารถซื้อขายได้',
                'description'    =>  '<div class="discription">
                <p>ภายในโปรแกรม SurgeTrader มีตราสารหลากหลายให้คุณซื้อขาย รวมถึง FX, หุ้นที่เลือก, ดัชนีตลาดหุ้นหลัก, น้ำมัน, โลหะ และสกุลเงินดิจิตอล</p>
                <p>เทรดเดอร์มีตัวเลือกในการซื้อขายบนแพลตฟอร์มที่ได้รับความนิยมสูงสุดซึ่งให้บริการผ่านโบรกเกอร์พันธมิตร EightCap ของเรา</p>
              </div>',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // follow rules
            [
                'section_key'    => 'follow-rules',
                'title'          => 'Two Easy-To-Follow Rules',
                'description'    =>  "At SurgeTrader, we make it easy to focus on what’s most important… finding good trades and making a profit.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'follow-rules',
                'title'          => '守りやすい 2 つのルール',
                'description'    =>  'SurgeTrader では、最も重要なこと、つまり良い取引を見つけて利益を上げることに集中しやすくしています。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'follow-rules',
                'title'          => 'กฎสองข้อที่ปฏิบัติตามง่าย',
                'description'    =>  "ที่ SurgeTrader เราทำให้การมุ่งเน้นไปที่สิ่งที่สำคัญที่สุด... ค้นหาการซื้อขายที่ดีและทำกำไรเป็นเรื่องง่าย",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            // stop loss
            [
                'section_key'    => 'stop-loss',
                'title'          => 'Stop Loss',
                'description'    =>  "A stop-loss is required for each trade.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'stop-loss',
                'title'          => 'ストップロス',
                'description'    =>  '取引ごとにストップロスが必要です。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'stop-loss',
                'title'          => 'หยุดการสูญเสีย',
                'description'    =>  "จำเป็นต้องมีจุดหยุดขาดทุนสำหรับการซื้อขายแต่ละครั้ง",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            // maximum open lotsF
            [
                'section_key'    => 'max-open-lots',
                'title'          => 'Maximum Open Lots',
                'description'    =>  "Traders may have a maximum number of open lots equal to 1/10000 the size of their account.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'max-open-lots',
                'title'          => '最大オープンロット数',
                'description'    =>  'トレーダーは、口座サイズの 1/10000 に等しいオープンロットの最大数を持つことができます。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'max-open-lots',
                'title'          => 'ล็อตเปิดสูงสุด',
                'description'    =>  "เทรดเดอร์อาจมีจำนวนล็อตที่เปิดสูงสุดเท่ากับ 1/10,000 ของขนาดบัญชีของพวกเขา",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            // one time fee
            [
                'section_key'    => 'one-time-fee',
                'title'          => 'One-Time Fee',
                'description'    =>  "No monthly subscriptions. Just a single investment.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'one-time-fee',
                'title'          => '1時間料金',
                'description'    =>  '毎月の定期購入はありません。たった一度の投資です。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'one-time-fee',
                'title'          => 'ค่าธรรมเนียมครั้งเดียว',
                'description'    =>  "ไม่มีการสมัครสมาชิกรายเดือน ลงทุนเพียงครั้งเดียว.",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // any stratagy
            [
                'section_key'    => 'any-stratagy',
                'title'          => 'Any Strategy',
                'description'    =>  "Trade the strategy that works for you.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'any-stratagy',
                'title'          => 'あらゆる戦略',
                'description'    =>  '自分に合った戦略をトレードしましょう。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'any-stratagy',
                'title'          => 'กลยุทธ์ใดๆ',
                'description'    =>  "แลกเปลี่ยนกลยุทธ์ที่เหมาะกับคุณ",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            // two simple rules
            [
                'section_key'    => 'two-simple-rules',
                'title'          => 'Two Simple Rules',
                'description'    =>  "No long list of confusing rules to follow.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'two-simple-rules',
                'title'          => '2 つの簡単なルール',
                'description'    =>  '従うべき複雑なルールの長いリストは必要ありません。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'two-simple-rules',
                'title'          => 'กฎง่ายๆ สองข้อ',
                'description'    =>  "ไม่มีกฎเกณฑ์ที่น่าสับสนให้ปฏิบัติตามอีกต่อไป",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            // pass quickely
            [
                'section_key'    => 'pass-quickly',
                'title'          => 'Pass Quickly',
                'description'    =>  "No minimum trading days. Pass and you're in.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'pass-quickly',
                'title'          => '早くパスしてください',
                'description'    =>  '最低取引日数はありません。通過すれば入場です。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'pass-quickly',
                'title'          => 'ผ่านไปอย่างรวดเร็ว',
                'description'    =>  "ไม่มีจำนวนวันซื้อขายขั้นต่ำ ผ่านแล้วคุณก็เข้า",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            // account limit
            [
                'section_key'    => 'account-limits',
                'title'          => 'Account Limits',
                'description'    =>  '<div class="discription mb-0">
                <p>Breaching these account limits will result in closing of trader’s account and a reset
                    will be required to qualify for a funded account.</p>
            </div>
            <hr>
            <div class="note body-font-small">
                <p>*Note: The daily loss limit applies to current daily equity. For example, a trader with a
                    $100,000 funded account would have a $5,000 daily loss limit. If the trader ran up a
                    profit of $10,000, their new daily loss limit would be $5,500 – or 5% of their new
                    balance of $110,000.</p>
            </div>',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'account-limits',
                'title'          => 'アカウント制限',
                'description'    =>  '<div class="discription mb-0">
                <p>これらの口座制限に違反すると、トレーダーの口座は閉鎖され、資金提供された口座の資格を得るにはリセットが必要になります。</p>
            </div>
            <hr>
            <div class="note body-font-small">
                <p>*注: 1 日あたりの損失制限は、現在の 1 日あたりの資産に適用されます。たとえば、100,000 ドルの資金が口座にあるトレーダーには、1 日の損失限度額が 5,000 ドルとなります。トレーダーが 10,000 ドルの利益を上げた場合、新しい 1 日の損失限度額は 5,500 ドル、つまり新しい残高 110,000 ドルの 5% になります。</p>
            </div>',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'account-limits',
                'title'          => 'ขีดจำกัดบัญชี',
                'description'    =>  '<div class="discription mb-0">
                <p>การละเมิดขีดจำกัดบัญชีเหล่านี้จะส่งผลให้บัญชีของเทรดเดอร์ถูกปิด และจำเป็นต้องรีเซ็ตจึงจะมีคุณสมบัติสำหรับบัญชีที่ได้รับเงินทุน</p>
            </div>
            <hr>
            <div class="note body-font-small">
                <p>*หมายเหตุ: ขีดจำกัดการสูญเสียรายวันใช้กับอิควิตี้รายวันในปัจจุบัน ตัวอย่างเช่น เทรดเดอร์ที่มีบัญชีเงินทุน $100,000 จะมีขีดจำกัดการขาดทุนรายวัน $5,000 หากผู้ซื้อขายทำกำไรได้ $10,000 ขีดจำกัดการสูญเสียรายวันใหม่ของพวกเขาจะเท่ากับ $5,500 – หรือ 5% ของยอดคงเหลือใหม่ $110,000</p>
            </div>',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            // maximum drawdown
            [
                'section_key'    => 'max-drawdown',
                'title'          => '8% Maximum Drawdown',
                'description'    =>  "Traders may not incur losses exceeding 8%, on a trailing basis up to starting balance +8%. Once a trader has reached 8% profits in their account, the trailing drawdown becomes obsolete, and traders are allowed to drawdown back to their starting balance before breaching.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'max-drawdown',
                'title'          => '最大ドローダウン8%',
                'description'    =>  'トレーダーは、開始残高 +8% までのトレーリングベースで、8% を超える損失を被ることはできません。トレーダーが口座の利益の 8% に達すると、トレーリングドローダウンは廃止され、トレーダーは違反する前に開始残高までドローダウンすることができます。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'max-drawdown',
                'title'          => 'การเบิกถอนสูงสุด 8%',
                'description'    =>  "เทรดเดอร์จะต้องไม่ขาดทุนเกิน 8% โดยอิงตามราคาต่อท้ายจนถึงยอดคงเหลือเริ่มต้น +8% เมื่อเทรดเดอร์มีกำไรถึง 8% ในบัญชีของพวกเขา การขาดทุนต่อเนื่องจะล้าสมัย และเทรดเดอร์จะได้รับอนุญาตให้ถอนเงินกลับไปยังยอดคงเหลือเริ่มต้นก่อนที่จะละเมิด",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            // daily loss
            [
                'section_key'    => 'daily-loss',
                'title'          => '5% Daily loss Limits',
                'description'    =>  "Incurred losses cannot exceed 5% of your account equity in a given day.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'daily-loss',
                'title'          => '5% 1 日あたりの損失制限',
                'description'    =>  '1 日に被る損失はアカウント資産の 5% を超えることはできません。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'daily-loss',
                'title'          => '5% ขีดจำกัดการสูญเสียรายวัน',
                'description'    =>  "การขาดทุนที่เกิดขึ้นจะต้องไม่เกิน 5% ของมูลค่าบัญชีของคุณในวันที่กำหนด",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],



            // technology platform
            [
                'section_key'    => 'platform',
                'title'          => 'Platform',
                'description'    =>  "Get your account and access our proprietary trader portal in under 5 minutes through our leading-edge automation technology. No waiting. No screening. Just SurgeTrading.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'platform',
                'title'          => 'プラットホーム',
                'description'    =>  'アカウントを取得し、最先端の自動化テクノロジーを通じて 5 分以内に独自のトレーダー ポータルにアクセスします。待つ必要はありません。審査はありません。まさにサージトレーディング。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'platform',
                'title'          => 'แพลตฟอร์ม',
                'description'    =>  "รับบัญชีของคุณและเข้าถึงพอร์ทัลเทรดเดอร์ที่เป็นกรรมสิทธิ์ของเราภายในเวลาไม่ถึง 5 นาทีผ่านเทคโนโลยีอัตโนมัติระดับแนวหน้าของเรา ไม่ต้องรอ ไม่มีการคัดกรอง เพียงแค่ SurgeTrading",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // Accelerate Your Journey To Being A Funded Trader
            [
                'section_key'    => 'accelerate_funded_trader',
                'title'          => 'Accelerate Your Journey To Being A Funded Trader',
                'description'    =>  "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the</p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                has been the industry's standard dummy text ever since the</p>",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'accelerate_funded_trader',
                'title'          => '資金提供されたトレーダーになるための旅を加速する',
                'description'    =>  "<p>Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum は、</p>
                <p>Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum は、</p>",
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'accelerate_funded_trader',
                'title'          => 'เร่งการเดินทางของคุณสู่การเป็นเทรดเดอร์ที่ได้รับทุน',
                'description'    =>  "<p>Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum กลายเป็นข้อความจำลองมาตรฐานของอุตสาหกรรมมานับตั้งแต่นั้นเป็นต้นมา</p>
                <p>Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum กลายเป็นข้อความจำลองมาตรฐานของอุตสาหกรรมมานับตั้งแต่นั้นเป็นต้นมา</p>",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // Tech fast
            [
                'section_key'    => 'tech_fast',
                'title'          => 'Fast',
                'description'    =>  "Get immediate access to an account with tight spreads and low commissions.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'tech_fast',
                'title'          => '速い',
                'description'    =>  'タイトなスプレッドと低手数料のアカウントにすぐにアクセスできます。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'tech_fast',
                'title'          => 'เร็ว',
                'description'    =>  "เข้าถึงบัญชีได้ทันทีด้วยสเปรดที่แคบและค่าคอมมิชชั่นต่ำ",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // tech dashboard
            [
                'section_key'    => 'tech_dashboard',
                'title'          => 'Dashboard',
                'description'    =>  "Track your performance and trading metrics in our trader portal.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'tech_dashboard',
                'title'          => 'ダッシュボード',
                'description'    =>  'トレーダーポータルでパフォーマンスと取引指標を追跡します。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'tech_dashboard',
                'title'          => 'แผงควบคุม',
                'description'    =>  "ติดตามประสิทธิภาพและตัวชี้วัดการซื้อขายของคุณในพอร์ทัลผู้ซื้อขายของเรา",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // tech funding
            [
                'section_key'    => 'tech_funding',
                'title'          => 'Funding',
                'description'    =>  "Pass our audition and we’ll give you our money to trade.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'tech_funding',
                'title'          => '資金調達',
                'description'    =>  'オーディションに合格すれば、取引資金を差し上げます。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'tech_funding',
                'title'          => 'เงินทุน',
                'description'    =>  "ผ่านการคัดเลือกของเราแล้วเราจะให้เงินคุณเพื่อการค้า",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // tech profit
            [
                'section_key'    => 'tech_profits',
                'title'          => 'Profits',
                'description'    =>  "Keep up to 90% of the profits you generate off or our capital.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'tech_profits',
                'title'          => '利益',
                'description'    =>  'あなたが生み出した利益の最大 90% を当社の資本から留保してください。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'tech_profits',
                'title'          => 'กำไร',
                'description'    =>  "เก็บผลกำไรสูงสุด 90% ที่คุณสร้างขึ้นหรือเงินทุนของเรา",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // tech features
            [
                'section_key'    => 'features',
                'title'          => 'Features',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'features',
                'title'          => '特徴',
                'description'    =>  'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum はこれまで業界の標準的なダミー テキストでした',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'features',
                'title'          => 'คุณสมบัติ',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมเลยทีเดียว",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // tech start trading
            [
                'section_key'    => 'start_trading',
                'title'          => 'Start Trading',
                'description'    =>  "The first step to becoming a professional trader starts here. We have the tools. We have the capital. We need your talent. We want you to be the next SurgeTrader.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'start_trading',
                'title'          => '取引を開始する',
                'description'    =>  'プロトレーダーへの第一歩はここから始まります。道具は揃っています。私たちには資本があります。私たちはあなたの才能を必要としています。私たちはあなたに次のSurgeTraderになってほしいと考えています。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'start_trading',
                'title'          => 'เริ่มต้นการซื้อขาย',
                'description'    =>  "ก้าวแรกสู่การเป็นเทรดเดอร์มืออาชีพเริ่มต้นที่นี่ เรามีเครื่องมือ เรามีทุน. เราต้องการความสามารถของคุณ เราอยากให้คุณเป็น SurgeTrader คนต่อไป",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],



            // meet our founder
            [
                'section_key'    => 'meet_our_founder',
                'title'          => 'Meet Our Founder',
                'description'    =>  '<div class="discription mb-30">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry"s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make</p></div><div class="founder-signature mb-30"><img src="images/meet-our-founder/founder-signature.png" alt="meet-our-founder"></div>
                <div class="discription"><p>Driving Global Ventures to SUSTAINABLE| Success</p></div>',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'meet_our_founder',
                'title'          => '取引を開始する',
                'description'    =>  '<div class="discription mb-30">
                <p>Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum は、1500 年代以来、業界の標準的なダミーテキストであり、当時、無名の印刷業者が活字のゲラをスクランブルして作成したものでした。</p></div><div class="founder-signature mb-30"><img src="images/meet-our-founder/founder-signature.png" alt="meet-our-founder"></div>
                <div class="discription"><p>グローバルベンチャーを持続可能に推進|成功</p></div>',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'meet_our_founder',
                'title'          => 'เริ่มต้นการซื้อขาย',
                'description'    =>  '<div class="discription mb-30">
                <p>Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมนับตั้งแต่ช่วงทศวรรษปี 1500 เมื่อเครื่องพิมพ์ที่ไม่รู้จักได้เอาเครื่องพิมพ์มาสลับสับเปลี่ยนเพื่อทำ</p></div><div class="founder-signature mb-30"><img src="images/meet-our-founder/founder-signature.png" alt="meet-our-founder"></div>
                <div class="discription"><p>ขับเคลื่อน Global Ventures สู่ความยั่งยืน| ความสำเร็จ</p></div>',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // Why Build Surgetrader? Find Out how It All Started
            [
                'section_key'    => 'why_build_surgetrader',
                'title'          => 'why build <br> <strong>surgetrader?</strong> find out<br> how it all started',
                'description'    =>  "SurgeTrader is looking for long term relationships with great traders. We set out to create an experience for our traders to feel valued and want to set the new standard in the trading
                world.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'why_build_surgetrader',
                'title'          => 'なぜ建てるのか <br> <strong>急騰トレーダー?</strong> 探し出す<br> すべてはどのように始まったのか',
                'description'    =>  'SurgeTrader は、優れたトレーダーとの長期的な関係を求めています。私たちは創造に着手しました
                私たちのトレーダーが価値を感じ、取引の世界に新しい基準を打ち立てたいと思うための経験です。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'why_build_surgetrader',
                'title'          => 'ทำไมต้องสร้าง <br> <strong>ศัลยแพทย์?</strong>หา<br> ทุกอย่างเริ่มต้นอย่างไร',
                'description'    =>  "SurgeTrader กำลังมองหาความสัมพันธ์ระยะยาวกับเทรดเดอร์ผู้ยิ่งใหญ่ เรามุ่งมั่นที่จะสร้างประสบการณ์ให้เทรดเดอร์ของเรารู้สึกมีคุณค่าและต้องการสร้างมาตรฐานใหม่ในโลกการซื้อขาย",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // Join My Team Latest From Instastagram
            [
                'section_key'    => 'instagram_user',
                'title'          => 'Join My Team Latest From Instagram',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'instagram_user',
                'title'          => '私のチームに参加してください Instagram からの最新情報',
                'description'    =>  'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum はこれまで業界の標準的なダミー テキストでした',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'instagram_user',
                'title'          => 'เข้าร่วมทีมของฉันล่าสุดจาก Instagram',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมเลยทีเดียว",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // Connect With Me On Social
            [
                'section_key'    => 'connect_on_socail_media',
                'title'          => 'Connect With Me On Social',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'connect_on_socail_media',
                'title'          => 'ソーシャルでつながりましょう',
                'description'    =>  'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum はこれまで業界の標準的なダミー テキストでした',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'connect_on_socail_media',
                'title'          => 'เชื่อมต่อกับฉันบนโซเชียล',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมเลยทีเดียว",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],


            // Meet The Team
            [
                'section_key'    => 'meet_the_team',
                'title'          => 'Meet The Team',
                'description'    =>  "Great things in business are never done by one person. They’re done by a team.These are the people behind SurgeTrader, helping traders accelerate their profits & live their best lives.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'meet_the_team',
                'title'          => 'チームの紹介',
                'description'    =>  'ビジネスにおける偉大なことは、決して一人の人間によって成し遂げられるものではありません。これらはチームによって行われます。これらは SurgeTrader の背後にいる人々であり、トレーダーが利益を加速し、最高の生活を送るのを支援しています。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'meet_the_team',
                'title'          => 'พบกับทีม',
                'description'    =>  "สิ่งที่ยิ่งใหญ่ในธุรกิจไม่เคยทำโดยคนๆ เดียว ดำเนินการโดยทีมงาน คนเหล่านี้คือบุคคลที่อยู่เบื้องหลัง SurgeTrader ช่วยให้เทรดเดอร์เร่งผลกำไรและใช้ชีวิตที่ดีที่สุด",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // What Our Traders Say (Testimonial)
            [
                'section_key'    => 'What_Our_Traders_Say',
                'title'          => 'What Our Traders Say',
                'description'    =>  "Trusted reviews from Trustpilot. Visit our Trustpilot page for more reviews.
                our-traders-2 Floyd Miles.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'What_Our_Traders_Say',
                'title'          => 'トレーダーの意見',
                'description'    =>  'Trustpilot による信頼できるレビュー。詳しいレビューについては、Trustpilot ページをご覧ください。our-traders-2 フロイド・マイルズ。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'What_Our_Traders_Say',
                'title'          => 'สิ่งที่เทรดเดอร์ของเราพูด',
                'description'    =>  "บทวิจารณ์ที่เชื่อถือได้จาก Trustpilot ไปที่หน้า Trustpilot ของเราเพื่อดูบทวิจารณ์เพิ่มเติม ผู้ค้าของเรา-2 Floyd Miles",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // Who Is Surgetrader?
            [
                'section_key'    => 'who_is_surgetrader',
                'title'          => 'Who Is Surgetrader?',
                'description'    =>  '<div class="discription">
                <p>The firm and our trader community carry deep venture capital backing from our partner Valo Holdings. Thus, the company’s finances are stable and secure — and capital investments are deployed with the objective of long-term success, rather than short-term gain.</p></div><ul class="no-link"><li><div class="icon"><img src="images/about-surgetrader/1.svg" alt="1"></div><div class="icon-text">Simple, Straight Forward Trading Rules</div></li>
                <li>
                    <div class="icon">
                        <img src="images/about-surgetrader/2.svg" alt="2">
                    </div>
                    <div class="icon-text">One-Step Evaluation</div>
                </li>
                <li>
                    <div class="icon">
                        <img src="images/about-surgetrader/3.svg" alt="3">
                    </div>
                    <div class="icon-text">No Time Limits</div>
                </li>
                <li>
                    <div class="icon">
                        <img src="images/about-surgetrader/4.svg" alt="4">
                    </div>
                    <div class="icon-text">World-Class Customer Support</div>
                </li></ul><div class="discription">
                <p>We are a global prop trading firm, based in the United States, helping traders around the world earn better profits on their trading skill. The SurgeTrader program was built with the following cornerstones:</p></div>',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'who_is_surgetrader',
                'title'          => 'サージトレーダーとは誰ですか?',
                'description'    =>  '<div class="discription">
                <p>当社とトレーダーコミュニティは、パートナーである Valo Holdings からの豊富なベンチャーキャピタルの支援を受けています。したがって、同社の財務は安定して安全であり、設備投資は短期的な利益ではなく長期的な成功を目的として展開されています。</p></div><ul class="no-link"><li><div class="icon"><img src="images/about-surgetrader/1.svg" alt="1"></div><div class="icon-text">シンプルでわかりやすい取引ルール</div></li>
                <li>
                    <div class="icon">
                        <img src="images/about-surgetrader/2.svg" alt="2">
                    </div>
                    <div class="icon-text">ワンステップ評価</div>
                </li>
                <li>
                    <div class="icon">
                        <img src="images/about-surgetrader/3.svg" alt="3">
                    </div>
                    <div class="icon-text">時間制限なし</div>
                </li>
                <li>
                    <div class="icon">
                        <img src="images/about-surgetrader/4.svg" alt="4">
                    </div>
                    <div class="icon-text">ワールドクラスのカスタマーサポート</div>
                </li></ul><div class="discription">
                <p>当社は米国に本拠を置く世界的なプロップトレーディング会社であり、世界中のトレーダーがトレーディングスキルでより良い利益を得るのを支援しています。 SurgeTrader プログラムは次の基礎を基に構築されています。</p></div>',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'who_is_surgetrader',
                'title'          => 'ศัลยแพทย์คือใคร?',
                'description'    =>  '<div class="discription">
                <p>บริษัทและชุมชนเทรดเดอร์ของเราได้รับการสนับสนุนจาก Valo Holdings ซึ่งเป็นหุ้นส่วนของเรา ดังนั้นการเงินของบริษัทจึงมีเสถียรภาพและปลอดภัย และการลงทุนถูกนำไปใช้โดยมีวัตถุประสงค์เพื่อความสำเร็จในระยะยาว แทนที่จะเป็นผลกำไรระยะสั้น</p></div><ul class="no-link"><li><div class="icon"><img src="images/about-surgetrader/1.svg" alt="1"></div><div class="icon-text">กฎการซื้อขายที่เรียบง่ายและตรงไปตรงมา</div></li>
                <li>
                    <div class="icon">
                        <img src="images/about-surgetrader/2.svg" alt="2">
                    </div>
                    <div class="icon-text">การประเมินขั้นตอนเดียว</div>
                </li>
                <li>
                    <div class="icon">
                        <img src="images/about-surgetrader/3.svg" alt="3">
                    </div>
                    <div class="icon-text">ไม่มีการจำกัดเวลา</div>
                </li>
                <li>
                    <div class="icon">
                        <img src="images/about-surgetrader/4.svg" alt="4">
                    </div>
                    <div class="icon-text">การสนับสนุนลูกค้าระดับโลก</div>
                </li></ul><div class="discription">
                <p>เราเป็นบริษัทซื้อขายอุปกรณ์ประกอบฉากระดับโลกที่ตั้งอยู่ในสหรัฐอเมริกา ช่วยให้เทรดเดอร์ทั่วโลกได้รับผลกำไรที่ดีขึ้นจากทักษะการซื้อขายของพวกเขา โปรแกรม SurgeTrader ถูกสร้างขึ้นโดยมีรากฐานที่สำคัญดังต่อไปนี้:</p></div>',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            // glance
            [
                'section_key'    => 'glance',
                'title'          => 'Surgetrader At A Glance',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'glance',
                'title'          => 'サージトレーダーの概要',
                'description'    =>  'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum はこれまで業界の標準的なダミー テキストでした',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'glance',
                'title'          => 'ศัลยแพทย์โดยสรุป',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมเลยทีเดียว",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // Our Story
            [
                'section_key'    => 'our_story',
                'title'          => 'Our Story',
                'description'    =>  "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the</p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus </p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'our_story',
                'title'          => '私たちの物語',
                'description'    =>  "<p>Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。ローレム・イプサム</p>
                <p>Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。ローレム・イプサムは</p>
                <p>Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum は、無名の印刷業者が活字のゲラをスクランブルして活字見本帳を作成した 1500 年代以来、業界の標準的なダミーテキストです。それは 5 世紀だけでなく、電子写植への飛躍の時代にも、本質的には変わっていないまま生き残ってきました。 1960 年代に Lorem Ipsum の一節を含む Letraset シートのリリースによって普及し、さらに最近では Aldus のようなデスクトップ パブリッシング ソフトウェアによって普及しました。</p>
                <p>Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum は業界の標準です</p>",
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'our_story',
                'title'          => 'เรื่องราวของเรา',
                'description'    =>  "<p>Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ ลอเรม อิปซัม</p>
                <p>
                Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็น</p>
                <p>Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมนับตั้งแต่ช่วงทศวรรษปี 1500 เมื่อเครื่องพิมพ์ที่ไม่รู้จักเอาเครื่องพิมพ์ไปสับเปลี่ยนเพื่อสร้างหนังสือตัวอย่าง มันอยู่มาได้ไม่เพียงแค่ห้าศตวรรษเท่านั้น แต่ยังรวมถึงการก้าวกระโดดไปสู่การเรียงพิมพ์แบบอิเล็กทรอนิกส์ โดยยังคงไม่เปลี่ยนแปลง ได้รับความนิยมในช่วงทศวรรษปี 1960 ด้วยการเปิดตัวแผ่น Letraset ที่มีข้อความ Lorem Ipsum และล่าสุดคือกับซอฟต์แวร์การพิมพ์บนเดสก์ท็อปอย่าง Aldus</p>
                <p>Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นมาตรฐานของอุตสาหกรรม
                </p>",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            // Why Is SurgeTrader The Best Option For Funded Trader Accounts?
            [
                'section_key'    => 'why_is_surgeTrader',
                'title'          => 'Why is SurgeTrader <br> the best option for funded trader accounts? ',
                'description'    =>  "In this interview, find out why Chance enjoys being a part of the SurgeTrader roster of funded traders — from quick payouts to straightforward rules.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'why_is_surgeTrader',
                'title'          => '私たちの慈善活動',
                'description'    =>  'SurgeTrader における当社の基礎は、慈善活動を通じて変化をもたらすこと、つまりコミュニティや支援を必要としている世界中の組織に恩返しをすることにあります。私たちは、コミュニティの繁栄が世界を変えることができると信じています。だからこそ、SurgeTrader は社会的影響を与えるプログラムに時間、資金、リソースを投資しています。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'why_is_surgeTrader',
                'title'          => 'ใจบุญสุนทานของเรา',
                'description'    =>  "รากฐานที่สำคัญของเราที่ SurgeTrader คือการสร้างความแตกต่างผ่านการทำบุญ — การตอบแทนชุมชนของเราและองค์กรต่างๆ ทั่วโลกที่ต้องการความช่วยเหลือ เราเชื่อว่าชุมชนที่เจริญรุ่งเรืองสามารถเปลี่ยนโลกได้ และนั่นคือเหตุผลที่ SurgeTrader ลงทุนเวลา เงินทุน และทรัพยากรในโครงการสร้างผลกระทบทางสังคม",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],


            // Our Philanthropy
            [
                'section_key'    => 'our_philanthropy',
                'title'          => 'Our Philanthropy',
                'description'    =>  "A cornerstone of who we are at SurgeTrader is in making a difference through philanthropy — giving back to our communities and to organizations across the globe that need a helping hand. We believe that thriving communities can change the world, and that’s why SurgeTrader invests time, funds and resources in social impact programs",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'our_philanthropy',
                'title'          => '私たちの慈善活動',
                'description'    =>  'SurgeTrader における当社の基礎は、慈善活動を通じて変化をもたらすこと、つまりコミュニティや支援を必要としている世界中の組織に恩返しをすることにあります。私たちは、コミュニティの繁栄が世界を変えることができると信じています。だからこそ、SurgeTrader は社会的影響を与えるプログラムに時間、資金、リソースを投資しています。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'our_philanthropy',
                'title'          => 'ใจบุญสุนทานของเรา',
                'description'    =>  "รากฐานที่สำคัญของเราที่ SurgeTrader คือการสร้างความแตกต่างผ่านการทำบุญ — การตอบแทนชุมชนของเราและองค์กรต่างๆ ทั่วโลกที่ต้องการความช่วยเหลือ เราเชื่อว่าชุมชนที่เจริญรุ่งเรืองสามารถเปลี่ยนโลกได้ และนั่นคือเหตุผลที่ SurgeTrader ลงทุนเวลา เงินทุน และทรัพยากรในโครงการสร้างผลกระทบทางสังคม",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],


            // get in touch
            [
                'section_key'    => 'get_in_touch',
                'title'          => 'Get in Touch',
                'description'    =>  "We’re here to help you supercharge your trading activity with accelerated profits. Fill out the form to share your inquiry, & we’ll get back to you ASAP.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'get_in_touch',
                'title'          => '連絡する',
                'description'    =>  '私たちは、お客様の取引活動を加速させて収益を大幅に向上させるお手伝いをします。フォームに記入してお問い合わせを共有してください。できるだけ早くご連絡いたします。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'get_in_touch',
                'title'          => 'ได้รับการติดต่อ',
                'description'    =>  "เราพร้อมช่วยคุณเพิ่มกิจกรรมการซื้อขายของคุณด้วยผลกำไรแบบเร่งตัว กรอกแบบฟอร์มเพื่อแบ่งปันคำถามของคุณ แล้วเราจะติดต่อกลับโดยเร็วที่สุด",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],


            // Latest Surgetrader News
            [
                'section_key'    => 'latest_surgetrader_news',
                'title'          => 'Latest Surgetrader News',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'latest_surgetrader_news',
                'title'          => 'サージトレーダーの最新ニュース',
                'description'    =>  'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。ローレム・イプサムは',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'latest_surgetrader_news',
                'title'          => 'ข่าวศัลยแพทย์ล่าสุด',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum ก็มี",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // Our Latest Blogs
            [
                'section_key'    => 'our_latest_blogs',
                'title'          => 'Our Latest Blogs',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'our_latest_blogs',
                'title'          => '最新のブログ',
                'description'    =>  'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。ローレム・イプサムは',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'our_latest_blogs',
                'title'          => 'บล็อกล่าสุดของเรา',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum ก็มี",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // 25 Rules To Becoming A Disciplined Trader
            [
                'section_key'    => 'disciplined_trader',
                'title'          => '<strong>25 Rules</strong> to Becoming a Disciplined Trader',
                'description'    =>  '<div class="discription">
                <p>How is it that some traders only last a few months while others carve out a lifetime career? One word…
                    discipline.</p>
                <p>Download this free eBook for the top 25 most essential rules necessary to become a disciplined trader.
                </p>
            </div>',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'disciplined_trader',
                'title'          => '<strong>25 のルール</strong> 規律あるトレーダーになるために',
                'description'    =>  '<div class="discription">
                <p>トレーダーの中には数か月しか続かない人もいれば、生涯のキャリアを築く人もいるのはなぜでしょうか?一言…規律。</p>
                <p>この無料の eBook をダウンロードして、規律あるトレーダーになるために必要な最も重要なルールのトップ 25 をご覧ください.
                </p>
            </div>',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'disciplined_trader',
                'title'          => '<strong>กฎ 25 ข้อ</strong> สู่การเป็นเทรดเดอร์ที่มีวินัย',
                'description'    =>  '<div class="discription">
                <p>เป็นไปได้อย่างไรที่เทรดเดอร์บางคนใช้เวลาเพียงไม่กี่เดือนในขณะที่คนอื่นสร้างอาชีพตลอดชีวิต? บอกได้คำเดียวว่า...วินัย</p>
                <p>ดาวน์โหลด eBook ฟรีนี้เพื่อดูกฎที่สำคัญที่สุด 25 อันดับแรกที่จำเป็นในการเป็นเทรดเดอร์ที่มีวินัย.
                </p>
            </div>',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            //bk forex members Trading Group Access & Training
            [
                'section_key'    => 'trading_group_access_training',
                'title'          => 'Trading Group Access & Training',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'trading_group_access_training',
                'title'          => 'トレーディンググループへのアクセスとトレーニング',
                'description'    =>  'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。ローレム・イプサムは',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'trading_group_access_training',
                'title'          => 'การเข้าถึงและการฝึกอบรมกลุ่มการค้า',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum ก็มี",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            //whats included
            [
                'section_key'    => 'what_included',
                'title'          => "what's included",
                'description'    =>  "When you become a SurgeTrader, you instantly receive a 30-day membership to BKForex’s suite of resources — a $175 value.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'what_included',
                'title'          => '何が含まれていますか',
                'description'    =>  'SurgeTrader になると、BKForex の一連のリソースへの 30 日間のメンバーシップ (175 ドル相当) を即座に受け取ります。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'what_included',
                'title'          => 'มีอะไรบ้าง',
                'description'    =>  "เมื่อคุณเป็น SurgeTrader คุณจะได้รับสมาชิกภาพชุดทรัพยากรของ BKForex เป็นเวลา 30 วันทันที ซึ่งมีมูลค่า $175",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // Track Record
            [
                'section_key'    => 'track_record',
                'title'          => "Track Record",
                'description'    =>  '<div class="discription mb-30">
                <p>In 2021, Kathy and Boris posted trade ideas resulting in a net gain of 2,320 pips. Their trade ideas were net positive 11 out of 12 months.*</p>
                <p class="body-font-small">*Past performance is not indicative of future results</p>
            </div>',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'track_record',
                'title'          => '実績',
                'description'    =>  '<div class="discription mb-30">
                <p>2021 年、キャシーとボリスはトレードアイデアを投稿し、純利益 2,320 ピップスをもたらしました。彼らのトレードアイデアは、12 か月中 11 か月で純プラスとなりました。*</p>
                <p class="body-font-small">*過去の実績は将来の結果を示すものではありません</p>
            </div>',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'track_record',
                'title'          => 'บันทึกเสียง',
                'description'    =>  '<div class="discription mb-30">
                <p>ในปี 2021 Kathy และ Boris โพสต์แนวคิดการค้าซึ่งส่งผลให้มีกำไรสุทธิ 2,320 pip แนวคิดทางการค้าของพวกเขามีผลบวกสุทธิ 11 จาก 12 เดือน*</p>
                <p class="body-font-small">*ผลงานที่ผ่านมาไม่ได้บ่งบอกถึงผลลัพธ์ในอนาคต</p>
            </div>',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // 24/7 Chatrooms
            [
                'section_key'    => 'chatroom',
                'title'          => "24/7 Chatrooms",
                'description'    =>  "Engage with Boris, Kathy, and trader peers in the 24/7 chatrooms, available in Slack or Telegram. Kathy and Boris both maintain channels where they post their live trade ideas — including entries and exits.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'chatroom',
                'title'          => '24 時間年中無休のチャットルーム',
                'description'    =>  'Slack または Telegram で利用できる 24 時間年中無休のチャットルームで、ボリス、キャシー、トレーダー仲間と交流しましょう。キャシーとボリスは両方とも、エントリーとエグジットを含むライブトレードのアイデアを投稿するチャンネルを維持しています。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'chatroom',
                'title'          => 'ห้องสนทนา 24/7',
                'description'    =>  "มีส่วนร่วมกับ Boris, Kathy และเพื่อนร่วมงานในห้องสนทนาตลอด 24 ชั่วโมงทุกวัน ซึ่งมีให้บริการใน Slack หรือ Telegram Kathy และ Boris ต่างก็ดูแลช่องทางในการโพสต์แนวคิดการค้าขายแบบเรียลไทม์ รวมถึงการเข้าและออก",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            // Trading Indicators
            [
                'section_key'    => 'trading_indicators',
                'title'          => "Trading Indicators",
                'description'    =>  "Get access to BKForex’s proprietary indicators for TradingView — including Kathy’s ZIP indicator and Boris’s Bounce indicator.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'trading_indicators',
                'title'          => '取引指標',
                'description'    =>  'Kathy の ZIP インジケーターや Boris の Bounce インジケーターなど、TradingView 用の BKForex 独自のインジケーターにアクセスできます。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'trading_indicators',
                'title'          => 'ตัวชี้วัดการซื้อขาย',
                'description'    =>  "เข้าถึงตัวบ่งชี้ที่เป็นกรรมสิทธิ์ของ BKForex สำหรับ TradingView — รวมถึงตัวบ่งชี้ ZIP ของ Kathy และตัวบ่งชี้ Bounce ของ Boris",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            // Live Trading Webinars
            [
                'section_key'    => 'live_trading_webinar',
                'title'          => "Live Trading Webinars",
                'description'    =>  "Every day, Boris hosts his daily power hour trading session via webinar, where he trades the markets and analyzes a variety of financial instruments.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'live_trading_webinar',
                'title'          => 'ライブ取引ウェビナー',
                'description'    =>  'ボリスは毎日、ウェビナーを通じて毎日のパワーアワー取引セッションを主催し、そこで市場を取引し、さまざまな金融商品を分析します。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'live_trading_webinar',
                'title'          => 'การสัมมนาผ่านเว็บการซื้อขายสด',
                'description'    =>  "ทุกๆ วัน Boris จะจัดเซสชั่นการซื้อขายในช่วงเวลาเร่งด่วนทุกวันผ่านการสัมมนาผ่านเว็บ โดยเขาจะซื้อขายตลาดและวิเคราะห์เครื่องมือทางการเงินที่หลากหลาย",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // Best Affiliate Fees
            [
                'section_key'    => 'best_affiliate_fees',
                'title'          => "The Best Affiliate Fees",
                'description'    =>  '<div class="discription">
                <p>Partner with SurgeTrader for the most competitive commissions available with any prop trading firm affiliate program. Our affiliates earn 20% of the initial purchase price for new auditions. Whether you are a trading content creator, education provider or group administrator, your referrals to SurgeTrader can earn you a sizable income!</p>
            </div>
        </div>
    </div>
</div>
<div class="row gap-24">
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="position-relative box-card">
            <div class="box-icon">
                <img src="images/affiliates/1.svg" alt="affiliates">
            </div>
            <div class="box-text">
                <h4>Earn a 20%commission</h4>
                <div class="discription">
                    <p>You earn a 20% affiliate commission on all initial accounts!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="position-relative box-card">
            <div class="box-icon">
                <img src="images/affiliates/2.svg" alt="affiliates">
            </div>
            <div class="box-text">
                <h4>High-Value Transactions</h4>
                <div class="discription">
                    <p>The million-dollar Audition is priced at $6,500 and can generate a $1,300 affiliate commission!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="position-relative box-card">
            <div class="box-icon">
                <img src="images/affiliates/3.svg" alt="affiliates">
            </div>
            <div class="box-text">
                <h4>Frequent Payouts</h4>
                <div class="discription">
                    <p>SurgeTrader pays out promptly at the beginning of each month.</p>
                </div>
            </div>
        </div>
    </div>
</div>',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'best_affiliate_fees',
                'title'          => '最高のアフィリエイト料金',
                'description'    =>  '<div class="discription">
                <p>SurgeTrader と提携すると、プロップ取引会社のアフィリエイト プログラムで最も競争力のある手数料が得られます。当社のアフィリエイトは、新しいオーディションの初回購入価格の 20% を獲得します。あなたが取引コンテンツ作成者、教育プロバイダー、またはグループ管理者であっても、SurgeTrader への紹介によって多額の収入を得ることができます。</p>
            </div>
        </div>
    </div>
</div>
<div class="row gap-24">
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="position-relative box-card">
            <div class="box-icon">
                <img src="images/affiliates/1.svg" alt="affiliates">
            </div>
            <div class="box-text">
                <h4>20%のコミッションを獲得</h4>
                <div class="discription">
                    <p>すべての最初のアカウントで 20% のアフィリエイト コミッションを獲得できます。</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="position-relative box-card">
            <div class="box-icon">
                <img src="images/affiliates/2.svg" alt="affiliates">
            </div>
            <div class="box-text">
                <h4>高額取引</h4>
                <div class="discription">
                    <p>百万ドル規模のオーディションの価格は 6,500 ドルで、アフィリエイト手数料は 1,300 ドル発生します。</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="position-relative box-card">
            <div class="box-icon">
                <img src="images/affiliates/3.svg" alt="affiliates">
            </div>
            <div class="box-text">
                <h4>頻繁な支払い頻繁な支払い</h4>
                <div class="discription">
                    <p>SurgeTrader は毎月初めに即座に支払いを行います。</p>
                </div>
            </div>
        </div>
    </div>
</div>',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'best_affiliate_fees',
                'title'          => 'ค่าธรรมเนียมพันธมิตรที่ดีที่สุด',
                'description'    =>  '<div class="discription">
                <p>เป็นพันธมิตรกับ SurgeTrader เพื่อรับค่าคอมมิชชั่นที่แข่งขันได้มากที่สุดกับโปรแกรมพันธมิตรของบริษัทการค้าเสา บริษัทในเครือของเราจะได้รับ 20% ของราคาซื้อเริ่มแรกสำหรับการออดิชั่นใหม่ ไม่ว่าคุณจะเป็นผู้สร้างเนื้อหาการซื้อขาย ผู้ให้บริการด้านการศึกษา หรือผู้ดูแลกลุ่ม การแนะนำ SurgeTrader ของคุณสามารถสร้างรายได้มหาศาลให้กับคุณ!</p>
            </div>
        </div>
    </div>
</div>
<div class="row gap-24">
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="position-relative box-card">
            <div class="box-icon">
                <img src="images/affiliates/1.svg" alt="affiliates">
            </div>
            <div class="box-text">
                <h4>รับค่าคอมมิชชั่น 20%</h4>
                <div class="discription">
                    <p>คุณได้รับค่าคอมมิชชั่นพันธมิตร 20% จากบัญชีเริ่มต้นทั้งหมด!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="position-relative box-card">
            <div class="box-icon">
                <img src="images/affiliates/2.svg" alt="affiliates">
            </div>
            <div class="box-text">
                <h4>ธุรกรรมที่มีมูลค่าสูง</h4>
                <div class="discription">
                    <p>ออดิชั่นมูลค่าล้านดอลลาร์มีราคาอยู่ที่ 6,500 ดอลลาร์ และสามารถสร้างค่าคอมมิชชั่นพันธมิตรได้ 1,300 ดอลลาร์!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="position-relative box-card">
            <div class="box-icon">
                <img src="images/affiliates/3.svg" alt="affiliates">
            </div>
            <div class="box-text">
                <h4>การจ่ายเงินบ่อยครั้ง</h4>
                <div class="discription">
                    <p>SurgeTrader จ่ายเงินทันทีทุกต้นเดือน</p>
                </div>
            </div>
        </div>
    </div>
</div>',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],



            // Sign Up For The Surgetrader Affiliate Program
            [
                'section_key'    => 'Sign_up_for_the_surgetrader',
                'title'          => "Sign Up For The Surgetrader Affiliate Program",
                'description'    =>  "Fill out the form below to gain access to our affiliate program portal, along with your customized affiliate links, tracking metrics and affiliate marketing materials.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'Sign_up_for_the_surgetrader',
                'title'          => 'Surgetrader アフィリエイト プログラムにサインアップする',
                'description'    =>  '以下のフォームに記入して、カスタマイズされたアフィリエイト リンク、追跡指標、アフィリエイト マーケティング資料とともにアフィリエイト プログラム ポータルにアクセスしてください。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'Sign_up_for_the_surgetrader',
                'title'          => 'ลงทะเบียนสำหรับโปรแกรม Affiliate Surgetrader',
                'description'    =>  "กรอกแบบฟอร์มด้านล่างเพื่อเข้าถึงพอร์ทัลโปรแกรมพันธมิตรของเรา พร้อมด้วยลิงก์พันธมิตรที่คุณกำหนดเอง ตัวชี้วัดการติดตาม และสื่อการตลาดสำหรับพันธมิตร",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],


            // our_founder_banner_section_one //  Lorem Ipsum Is Simply Dummy
            [
                'section_key'    => 'our_founder_banner_section_one',
                'title'          => "Lorem Ipsum Is Simply Dummy",
                'description'    =>  '<div class="discription">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                    has been the industry standard dummy text ever since the 1500s, when an unknown
                    printer took a galley of type and scrambled it to make a type specimen book. It has
                    survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged. It was popularised in the 1960s with the release of
                    Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                    piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard
                    McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of
                    the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through
                    the cites of the word in classical literature,</p>
            </div>',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'our_founder_banner_section_one',
                'title'          => 'ロレム・イプサムは単なるダミーです',
                'description'    =>  '<div class="discription">
                <p>Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum は、無名の印刷業者が活字のゲラをスクランブルして活字見本帳を作成した 1500 年代以来、業界標準のダミーテキストです。それは 5 世紀だけでなく、電子写植への飛躍の時代にも、本質的には変わっていないまま生き残ってきました。これは、Lorem Ipsum の一節を含む Letraset シートのリリースによって 1960 年代に普及し、さらに最近では Lorem Ipsum のバージョンを含む Aldus PageMaker などのデスクトップ パブリッシング ソフトウェアによって普及しました。</p>
                <p>一般に信じられていることに反して、Lorem Ipsum は単なるランダムなテキストではありません。紀元前 45 年の古典ラテン文学にルーツがあり、2000 年以上の歴史があります。バージニア州ハンプデン・シドニー大学のラテン語教授リチャード・マクリントックは、
                より難解なラテン語の consectetur は、Lorem Ipsum の一節から引用され、
                古典文学におけるその言葉の引用、</p>
            </div>',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'our_founder_banner_section_one',
                'title'          => 'Lorem Ipsum เป็นเพียงเรื่องหลอกลวง',
                'description'    =>  '<div class="discription">
                <p>Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานอุตสาหกรรมนับตั้งแต่ช่วงปี 1500 เมื่อเครื่องพิมพ์ที่ไม่รู้จักได้นำเครื่องพิมพ์ไปสับเปลี่ยนเพื่อสร้างหนังสือตัวอย่าง มันอยู่มาได้ไม่เพียงแค่ห้าศตวรรษเท่านั้น แต่ยังรวมถึงการก้าวกระโดดไปสู่การเรียงพิมพ์แบบอิเล็กทรอนิกส์ โดยยังคงไม่เปลี่ยนแปลง ได้รับความนิยมในช่วงทศวรรษปี 1960 ด้วยการเปิดตัวแผ่น Letraset ที่มีข้อความ Lorem Ipsum และล่าสุดกว่านั้นคือซอฟต์แวร์เผยแพร่บนเดสก์ท็อปอย่าง Aldus PageMaker รวมถึง Lorem Ipsum เวอร์ชันต่างๆ ด้วย</p>
                <p>ตรงกันข้ามกับความเชื่อที่นิยม Lorem Ipsum ไม่ใช่เพียงข้อความแบบสุ่ม มีรากฐานมาจากวรรณกรรมละตินคลาสสิกชิ้นหนึ่งตั้งแต่ 45 ปีก่อนคริสตกาล ซึ่งมีอายุมากกว่า 2,000 ปี Richard McClintock ศาสตราจารย์ภาษาละตินที่ Hampden-Sydney College ในรัฐเวอร์จิเนีย มองหาหนึ่งในนั้น
                คำภาษาละตินที่คลุมเครือมากขึ้น consectetur จากข้อความ Lorem Ipsum และผ่านไป
                การอ้างอิงคำในวรรณคดีคลาสสิก</p>
            </div>',
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // School Of Forex Trading
            [
                'section_key'    => 'school_of_forex_trading',
                'title'          => 'School Of Forex Trading',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'school_of_forex_trading',
                'title'          => '外国為替取引学校',
                'description'    =>  'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum は、1500 年代以来、業界の標準的なダミー テキストであり、当時、無名の印刷業者が活字のゲラをスクランブルして作成したものでした。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'school_of_forex_trading',
                'title'          => 'โรงเรียนการซื้อขาย Forex',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมนับตั้งแต่ช่วงปี 1500 เมื่อเครื่องพิมพ์ที่ไม่รู้จักเครื่องหนึ่งนำเครื่องพิมพ์มาสลับสับเปลี่ยนเพื่อสร้าง",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // Track Your Progress
            [
                'section_key'    => 'track_your_progress',
                'title'          => 'Track Your Progress',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'track_your_progress',
                'title'          => '進捗状況を追跡する',
                'description'    =>  'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum は、無名の印刷業者が活字のゲラをスクランブルして活字見本帳を作成した 1500 年代以来、業界の標準的なダミーテキストです。それは 5 世紀だけでなく、電子写植への飛躍の時代にも、本質的には変わっていないまま生き残ってきました。 1960年代にLetrasetシートの発売により普及しました。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'track_your_progress',
                'title'          => 'ติดตามความคืบหน้าของคุณ',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมนับตั้งแต่ช่วงทศวรรษปี 1500 เมื่อเครื่องพิมพ์ที่ไม่รู้จักเอาเครื่องพิมพ์ไปสับเปลี่ยนเพื่อสร้างหนังสือตัวอย่าง มันอยู่มาได้ไม่เพียงแค่ห้าศตวรรษเท่านั้น แต่ยังรวมถึงการก้าวกระโดดไปสู่การเรียงพิมพ์แบบอิเล็กทรอนิกส์ โดยยังคงไม่เปลี่ยนแปลง ได้รับความนิยมในทศวรรษ 1960 ด้วยการเปิดตัวแผ่น Letraset",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            //learn forex banner one
            [
                'section_key'    => 'learn_forex_banner_one',
                'title'          => 'Join My Team Latest From Instagram',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'learn_forex_banner_one',
                'title'          => '私のチームに参加してください Instagram からの最新情報',
                'description'    =>  'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum はこれまで業界の標準的なダミー テキストでした',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'learn_forex_banner_one',
                'title'          => 'เข้าร่วมทีมของฉันล่าสุดจาก Instagram',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมเลยทีเดียว",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            //learn forex banner two
            [
                'section_key'    => 'learn_forex_banner_two',
                'title'          => 'Join My Team Latest From Instagram',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'learn_forex_banner_two',
                'title'          => '私のチームに参加してください Instagram からの最新情報',
                'description'    =>  'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum はこれまで業界の標準的なダミー テキストでした',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'learn_forex_banner_two',
                'title'          => 'เข้าร่วมทีมของฉันล่าสุดจาก Instagram',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมเลยทีเดียว",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // Course Content
            [
                'section_key'    => 'course_content',
                'title'          => 'Course Content',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'course_content',
                'title'          => '授業内容',
                'description'    =>  '以下のフォームに記入して、カスタマイズされたアフィリエイト リンク、追跡指標、アフィリエイト マーケティング資料とともにアフィリエイト プログラム ポータルにアクセスしてください。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'course_content',
                'title'          => 'เนื้อหาหลักสูตร',
                'description'    =>  "กรอกแบบฟอร์มด้านล่างเพื่อเข้าถึงพอร์ทัลโปรแกรมพันธมิตรของเรา พร้อมด้วยลิงก์พันธมิตรที่คุณกำหนดเอง ตัวชี้วัดการติดตาม และสื่อการตลาดสำหรับพันธมิตร",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],


            // How Do You Trade Forex?
            [
                'section_key'    => 'course',
                'title'          => 'How Do You Trade Forex?',
                'description'    =>  "Think the stock market is huge? Think again. Learn about the LARGEST financial market in the world and how to trade in it.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'course',
                'title'          => '外国為替取引はどのように行うのですか?',
                'description'    =>  '株式市場は巨大だと思いますか?もう一度考えて。世界最大の金融市場とその取引方法について学びましょう。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'course',
                'title'          => 'คุณซื้อขายฟอเร็กซ์อย่างไร?',
                'description'    =>  "คิดว่าตลาดหุ้นมีขนาดใหญ่มาก? คิดดูอีกครั้ง. เรียนรู้เกี่ยวกับตลาดการเงินที่ใหญ่ที่สุดในโลกและวิธีการซื้อขายในตลาดนั้น",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],


            // What You’ll Learn
            [
                'section_key'    => 'what_you_will_learn',
                'title'          => 'What you’ll Learn',
                'description'    =>  "Fill out the form below to gain access to our affiliate program portal, along with your customized affiliate links, tracking metrics and affiliate marketing materials.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'what_you_will_learn',
                'title'          => '何を学ぶか',
                'description'    =>  '以下のフォームに記入して、カスタマイズされたアフィリエイト リンク、追跡指標、アフィリエイト マーケティング資料とともにアフィリエイト プログラム ポータルにアクセスしてください。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'what_you_will_learn',
                'title'          => 'สิ่งที่คุณจะได้เรียน',
                'description'    =>  "กรอกแบบฟอร์มด้านล่างเพื่อเข้าถึงพอร์ทัลโปรแกรมพันธมิตรของเรา พร้อมด้วยลิงก์พันธมิตรที่คุณกำหนดเอง ตัวชี้วัดการติดตาม และสื่อการตลาดสำหรับพันธมิตร",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // faq how can we help
            [
                'section_key'    => 'how_can_we_help',
                'title'          => 'How Can We Help?',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'how_can_we_help',
                'title'          => 'どのように我々は助けることができます？',
                'description'    =>  'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum はこれまで業界の標準的なダミー テキストでした',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'how_can_we_help',
                'title'          => 'เราจะช่วยได้อย่างไร?',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมเลยทีเดียว",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // new to surgetrader
            [
                'section_key'    => 'new_to_surgetrader',
                'title'          => 'New to Surgetrader',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'new_to_surgetrader',
                'title'          => 'サージトレーダーの初心者',
                'description'    =>  'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum はこれまで業界の標準的なダミー テキストでした',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'new_to_surgetrader',
                'title'          => 'ใหม่กับศัลยแพทย์',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมเลยทีเดียว",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // Audition Process
            [
                'section_key'    => 'audition_process',
                'title'          => 'Audition Process',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'audition_process',
                'title'          => 'オーディションの流れ',
                'description'    =>  'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum はこれまで業界の標準的なダミー テキストでした',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'audition_process',
                'title'          => 'กระบวนการออดิชั่น',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมเลยทีเดียว",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // Trading Rules
            [
                'section_key'    => 'trading_rules',
                'title'          => 'Trading Rules',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'trading_rules',
                'title'          => '取引ルール',
                'description'    =>  'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum はこれまで業界の標準的なダミー テキストでした',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'trading_rules',
                'title'          => 'กฎการซื้อขาย',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมเลยทีเดียว",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // Funded Accounts
            [
                'section_key'    => 'funded_accounts',
                'title'          => 'Funded Accounts',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'funded_accounts',
                'title'          => '資金提供されたアカウント',
                'description'    =>  'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum はこれまで業界の標準的なダミー テキストでした',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'funded_accounts',
                'title'          => 'บัญชีที่ได้รับทุน',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมเลยทีเดียว",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // Platform & Dashboard

            [
                'section_key'    => 'platform_dashboard',
                'title'          => 'Platform & Dashboard',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'platform_dashboard',
                'title'          => 'プラットフォームとダッシュボード',
                'description'    =>  'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum はこれまで業界の標準的なダミー テキストでした',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'platform_dashboard',
                'title'          => 'แพลตฟอร์มและแดชบอร์ด',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมเลยทีเดียว",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // Orders & Billing
            [
                'section_key'    => 'orders_and_billing',
                'title'          => 'Orders & Billing',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'orders_and_billing',
                'title'          => '注文と請求',
                'description'    =>  'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum はこれまで業界の標準的なダミー テキストでした',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'orders_and_billing',
                'title'          => 'คำสั่งซื้อและการเรียกเก็บเงิน',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมเลยทีเดียว",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // affiliate faq
            [
                'section_key'    => 'affiliate_faq',
                'title'          => 'Surgetrader Affiliate Program Frequently Asked Questions',
                'description'    =>  "Fill out the form below to gain access to our affiliate program portal, along with your customized affiliate links, tracking metrics and affiliate marketing materials.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'affiliate_faq',
                'title'          => 'Surgetrader アフィリエイト プログラムのよくある質問',
                'description'    =>  '以下のフォームに記入して、カスタマイズされたアフィリエイト リンク、追跡指標、アフィリエイト マーケティング資料とともにアフィリエイト プログラム ポータルにアクセスしてください。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'affiliate_faq',
                'title'          => 'คำถามที่พบบ่อยเกี่ยวกับโปรแกรม Affiliate Surgetrader',
                'description'    =>  "กรอกแบบฟอร์มด้านล่างเพื่อเข้าถึงพอร์ทัลโปรแกรมพันธมิตรของเรา พร้อมด้วยลิงก์พันธมิตรที่คุณกำหนดเอง ตัวชี้วัดการติดตาม และสื่อการตลาดสำหรับพันธมิตร",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],


            // why trade with us
            [
                'section_key'    => 'why_trade_with_us',
                'title'          => 'Why Trade With Us',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'why_trade_with_us',
                'title'          => '当社と取引する理由',
                'description'    =>  'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum はこれまで業界の標準的なダミー テキストでした',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'why_trade_with_us',
                'title'          => 'ทำไมต้องซื้อขายกับเรา',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมเลยทีเดียว",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // Clear & Simple Trading Rules
            [
                'section_key'    => 'clear_and_simple_rules',
                'title'          => 'Clear & Simple Trading Rules',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'clear_and_simple_rules',
                'title'          => '明確でシンプルな取引ルール',
                'description'    =>  'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum はこれまで業界の標準的なダミー テキストでした',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'clear_and_simple_rules',
                'title'          => 'กฎการซื้อขายที่ชัดเจนและเรียบง่าย',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมเลยทีเดียว",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // One-Time Audition Fee
            [
                'section_key'    => 'one_time_aud_fee',
                'title'          => 'One-Time Audition Fee',
                'description'    =>  "No monthly fee. No hidden costs. No recurring costs. Just a one-time investment.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'one_time_aud_fee',
                'title'          => '1回限りのオーディション料金',
                'description'    =>  '月額料金はかかりません。隠れたコストはありません。定期的なコストはかかりません。たった一度きりの投資です。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'one_time_aud_fee',
                'title'          => 'ค่าธรรมเนียมออดิชั่นครั้งเดียว',
                'description'    =>  "ไม่มีค่าธรรมเนียมรายเดือน ไม่มีค่าใช้จ่ายแอบแฝง ไม่มีค่าใช้จ่ายที่เกิดขึ้น ลงทุนเพียงครั้งเดียว.",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // Flexible Trading
            [
                'section_key'    => 'flexible_trading',
                'title'          => 'Flexible Trading',
                'description'    =>  "We have no restrictions on trading style. Our program allows for any strategy.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'flexible_trading',
                'title'          => '柔軟な取引',
                'description'    =>  '取引スタイルに制限はありません。私たちのプログラムはあらゆる戦略を可能にします。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'flexible_trading',
                'title'          => 'การซื้อขายที่ยืดหยุ่น',
                'description'    =>  "เราไม่มีข้อ จำกัด เกี่ยวกับรูปแบบการซื้อขาย โปรแกรมของเราอนุญาตให้ใช้กลยุทธ์ใดก็ได้",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],


            // Easy Payout
            [
                'section_key'    => 'easy_payout',
                'title'          => 'Easy Payout',
                'description'    =>  "Get paid on your profits with a couple clicks — no minimum required.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'easy_payout',
                'title'          => '簡単な支払い',
                'description'    =>  '数回クリックするだけで利益に応じて支払いを受けられます。最低額は必要ありません。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'easy_payout',
                'title'          => 'การจ่ายเงินง่าย',
                'description'    =>  "รับผลกำไรของคุณด้วยการคลิกเพียงไม่กี่ครั้ง — ไม่มีขั้นต่ำ",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // Quick Customer Service
            [
                'section_key'    => 'quick_customer_service',
                'title'          => 'Quick Customer Service',
                'description'    =>  "Get answers quickly with our responsive customer service channels.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'quick_customer_service',
                'title'          => '迅速な顧客サービス',
                'description'    =>  '応答性の高いカスタマー サービス チャネルですぐに回答を得ることができます。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'quick_customer_service',
                'title'          => 'บริการลูกค้าด่วน',
                'description'    =>  "รับคำตอบอย่างรวดเร็วด้วยช่องทางการบริการลูกค้าที่ตอบสนองของเรา",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // Instant Funding
            [
                'section_key'    => 'instant_funding',
                'title'          => 'Instant Funding',
                'description'    =>  "Get funded instantly upon successfully passing the SurgeTrader Audition.",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'instant_funding',
                'title'          => '即時資金調達',
                'description'    =>  'SurgeTrader Audition に合格すると、すぐに資金を受け取ります。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'instant_funding',
                'title'          => 'เงินทุนทันที',
                'description'    =>  "รับเงินทุนทันทีเมื่อผ่าน SurgeTrader Audition สำเร็จ",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],



            // scale your account
            [
                'section_key'    => 'scale_your_account',
                'title'          => 'Scale Your Account From $25k To $1 Million',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'scale_your_account',
                'title'          => 'アカウントを 25,000 ドルから 100 万ドルにスケールアップ',
                'description'    =>  'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum はこれまで業界の標準的なダミー テキストでした',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'scale_your_account',
                'title'          => 'ขยายบัญชีของคุณจาก 25,000 ดอลลาร์เป็น 1 ล้านดอลลาร์',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมเลยทีเดียว",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // featured
            [
                'section_key'    => 'featured',
                'title'          => 'Featured',
                'description'    =>  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has",
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'featured',
                'title'          => '特徴',
                'description'    =>  'Lorem Ipsum は、印刷および植字業界の単なるダミー テキストです。 Lorem Ipsum はこれまで業界の標準的なダミー テキストでした',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'featured',
                'title'          => 'โดดเด่น',
                'description'    =>  "Lorem Ipsum เป็นเพียงข้อความจำลองของอุตสาหกรรมการพิมพ์และการเรียงพิมพ์ Lorem Ipsum เป็นข้อความจำลองมาตรฐานของอุตสาหกรรมเลยทีเดียว",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // surgetrader affiliate program frequently asked questions
            [
                'section_key'    => 'affiliate_faq',
                'title'          => "surgetrader affiliate program frequently asked questions",
                'description'    =>  'Fill out the form below to gain access to our affiliate program portal, along with your customized affiliate links, tracking metrics and affiliate marketing materials.',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'affiliate_faq',
                'title'          => 'サージトレーダー アフィリエイト プログラムのよくある質問',
                'description'    =>  '以下のフォームに記入して、カスタマイズされたアフィリエイト リンク、追跡指標、アフィリエイト マーケティング資料とともにアフィリエイト プログラム ポータルにアクセスしてください。',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'affiliate_faq',
                'title'          => 'คำถามที่พบบ่อยเกี่ยวกับโปรแกรมพันธมิตรศัลยแพทย์',
                'description'    =>  "กรอกแบบฟอร์มด้านล่างเพื่อเข้าถึงพอร์ทัลโปรแกรมพันธมิตรของเรา พร้อมด้วยลิงก์พันธมิตรที่คุณกำหนดเอง ตัวชี้วัดการติดตาม และสื่อการตลาดสำหรับพันธมิตร",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            
            // cookies policy
            [
                'section_key'    => 'cookies_policy',
                'title'          => "Cookies Policy",
                'description'    =>  'Text content is not available',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'cookies_policy',
                'title'          => 'クッキーポリシー',
                'description'    =>  'テキスト コンテンツは利用できません',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'cookies_policy',
                'title'          => 'นโยบายคุกกี้',
                'description'    =>  "เนื้อหาข้อความไม่พร้อมใช้งาน",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            // terms conditions
            [
                'section_key'    => 'terms_conditions',
                'title'          => "Terms & Conditions",
                'description'    =>  'Text content is not available',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'terms_conditions',
                'title'          => '利用規約',
                'description'    =>  'テキスト コンテンツは利用できません',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'terms_conditions',
                'title'          => 'ข้อกำหนดและเงื่อนไข',
                'description'    =>  "เนื้อหาข้อความไม่พร้อมใช้งาน",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],


            // affiliate agreement
            [
                'section_key'    => 'affiliate_agreement',
                'title'          => "Affiliate Agreement",
                'description'    =>  'Text content is not available',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'affiliate_agreement',
                'title'          => 'アフィリエイト契約',
                'description'    =>  'テキスト コンテンツは利用できません',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'affiliate_agreement',
                'title'          => 'ข้อตกลงพันธมิตร',
                'description'    =>  "เนื้อหาข้อความไม่พร้อมใช้งาน",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],

            
            // privacy policy
            [
                'section_key'    => 'privacy_policy',
                'title'          => "Privacy Policy",
                'description'    =>  'Text content is not available',
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'privacy_policy',
                'title'          => 'プライバシーポリシー',
                'description'    =>  'テキスト コンテンツは利用できません',
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'section_key'    => 'privacy_policy',
                'title'          => 'นโยบายความเป็นส่วนตัว',
                'description'    =>  "เนื้อหาข้อความไม่พร้อมใช้งาน",
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],


        ];

        Setting::insert($sections);
    }
}
