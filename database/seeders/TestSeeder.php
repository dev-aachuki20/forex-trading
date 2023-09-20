<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Setting::where('section_key','package')->update(['page_keys'=>json_encode(['home','get-funded','surge-trader-audition','scaling-plan','tradable-assets','bk-forex-membership','our-founder'])]);

        // Setting::where('section_key','our-company-works')->update(['page_keys'=>json_encode(['home'])]);

        // Setting::where('section_key','over-the-weekend')->update(['page_keys'=>json_encode(['home'])]);

        // Setting::where('section_key','over-the-weekend-two')->update(['page_keys'=>json_encode(['home'])]);

        // Setting::where('section_key','forex-trader-audition-step-one')->update(['page_keys'=>json_encode(['home'])]);
        // Setting::where('section_key','forex-trader-audition-step-two')->update(['page_keys'=>json_encode(['home'])]);
        // Setting::where('section_key','why-we-different')->update(['page_keys'=>json_encode(['home'])]);
        // Setting::where('section_key','trader-portal')->update(['page_keys'=>json_encode(['home'])]);

        // Setting::where('section_key','earn-more-trading-activity')->update(['page_keys'=>json_encode(['home','get-funded','trading-rules'])]);

        // Setting::where('section_key','What_Our_Traders_Say')->update(['page_keys'=>json_encode(['home','surgetrader-team'])]);

        // Setting::where('section_key','why_trade_with_us')->update(['page_keys'=>json_encode(['home','faq'])]);

        // Setting::where('section_key','trading-rules')->update(['page_keys'=>json_encode(['get-funded'])]);

        // Setting::where('section_key', 'withdrawing-profits')->update(['page_keys' => json_encode(['get-funded'])]);

        // Setting::where('section_key', 'profit')->update(['page_keys' => json_encode(['get-funded'])]);

        // Setting::where('section_key', 'easy')->update(['page_keys' => json_encode(['get-funded'])]);

        // Setting::where('section_key', 'fast')->update(['page_keys' => json_encode(['get-funded'])]);

        // Setting::where('section_key', 'support')->update(['page_keys' => json_encode(['get-funded'])]);

        // Setting::where('section_key', 'how-it-works')->update(['page_keys' => json_encode(['surge-trader-audition','scaling-plan'])]);

        // Setting::where('section_key', 'option-one')->update(['page_keys' => json_encode(['surge-trader-audition','scaling-plan'])]);

        // Setting::where('section_key', 'option-two')->update(['page_keys' => json_encode(['surge-trader-audition','scaling-plan'])]);

        // Setting::where('section_key', 'audition_process')->update(['page_keys' => json_encode(['surge-trader-audition','faq'])]);

        // Setting::where('section_key', 'scale_your_account')->update(['page_keys' => json_encode(['scaling-plan'])]);

        // Setting::whereIn('section_key', ['follow-rules','stop-loss','max-open-lots','one-time-fee','any-stratagy','two-simple-rules','pass-quickly','account-limits','max-drawdown','daily-loss'])->update(['page_keys' => json_encode(['trading-rules'])]);

        // Setting::whereIn('section_key', ['tradable-instrument'])->update(['page_keys' => json_encode(['tradable-assets'])]);

        // Setting::whereIn('section_key', ['platform','accelerate_funded_trader','tech_fast','tech_dashboard','tech_funding','tech_profits','features','start_trading'])->update(['page_keys' => json_encode(['technology'])]);


        // Setting::whereIn('section_key', ['how_can_we_help','new_to_surgetrader','trading_rules','funded_accounts','platform_dashboard','orders_and_billing'])->update(['page_keys' => json_encode(['faq'])]);


        
    }
}
