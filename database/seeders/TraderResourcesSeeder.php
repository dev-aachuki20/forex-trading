<?php

namespace Database\Seeders;

use App\Models\TraderResource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TraderResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('trader_resources')->truncate();
        $trader_resources = [
            [
                'title'          => 'Everything You Need To Know About Moving Averages',
                'description'    =>  "In this whitepaper, find out about simple moving averages, exponential moving averages, how to find a trend, what a crossover means, moving average envelopes, the Guppy Multiple Moving Average and more.",
                'is_primary'     =>  1,
                'language_id'    =>  1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'title'          => '移動平均について知っておくべきことすべて',
                'description'    =>  "このホワイトペーパーでは、単純移動平均、指数移動平均、トレンドの見つけ方、クロスオーバーの意味、移動平均エンベロープ、グッピー複数移動平均などについて説明します。",
                'is_primary'     =>  1,
                'language_id'    =>  2,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'title'          => 'ทุกสิ่งที่คุณต้องการรู้เกี่ยวกับค่าเฉลี่ยเคลื่อนที่',
                'description'    =>  "ในเอกสารไวท์เปเปอร์นี้ คุณจะพบข้อมูลเกี่ยวกับค่าเฉลี่ยเคลื่อนที่อย่างง่าย ค่าเฉลี่ยเคลื่อนที่แบบเอ็กซ์โปเนนเชียล วิธีค้นหาแนวโน้ม ความหมายของครอสโอเวอร์ ขอบเขตของค่าเฉลี่ยเคลื่อนที่ ค่าเฉลี่ยเคลื่อนที่หลายตัวของ Guppy และอื่นๆ อีกมากมาย",
                'is_primary'     =>  1,
                'language_id'    =>  3,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
        ];
        TraderResource::insert($trader_resources);
    }
}
