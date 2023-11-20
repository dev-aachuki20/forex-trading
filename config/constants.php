<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Request Type List
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the request type list 
    |
    */
    'app_name' => env('APP_NAME', 'Rishard Bell'),
    // 'app_mode' => env('APP_MODE', 'staging'),
    // 'owner_email_id' => 'rohithelpfullinsight@gmail.com',

    'default' => [
        'logo'             => 'admin/png/logo-light.png',
        'favicon'          => 'images/favicon.png',
        'short_logo'       => 'images/logo-mini.png',
        'transparent_logo' => 'assets/logo/logo-transparent.png',
        'profile_image'    => 'default/default-user.svg',
        'footer_logo'      => 'admin/png/logo-light.png',
        'user_logo'        => 'default/default-user.jpg',
    ],

    'date_format'     => 'd-m-Y',
    'month_year_format'     => 'm/Y',
    'datetime_format' => 'd-m-Y H:i',
    'time_format'     => 'H:i:s',
    'search_datetime_format' => '%d-%m-%Y %H:%i',
    'search_date_format' => '%d-%m-%Y',
    'month_format' => 'F j, Y',
    'date_month_format' => 'j-F-Y',

    'timezone' => 'Asia/kolkata', // set timezone

    'country_timezone_hours' => [
        1 => 1, //English - Uk time +1
        2 => 9, //Japnese - Japan time +9
        3 => 7, //Thai    - Thailand time +7
    ],

    'country_timezone' => [
        1 => 'Europe/London', //English - Uk time +1
        2 => 'Asia/Tokyo', //Japnese - Japan time +9
        3 => 'Asia/Bangkok', //Thai    - Thailand time +7
    ],

    'logo_min_width' => '1000', // logo min width
    'logo_min_height' => '1000', // logo min height

    'profile_image_size' => '1024',

    'img_max_size'   => '2048',
    'video_max_size' => '50240',
    'data_max_file_size' => "50M",
    'no_image_url'   => 'default/no-image.jpg',
    'default_user_logo' => 'default/default-user.svg',


    'slider_limit' => '5',

    'slider_type' => [
        'banner',
    ],

    'gender_options' => [
        1 => "Male",
        2 => "Female",
        3 => "Other",
    ],

    // 'setting_types' => [
    //     "logo",
    //     "social media",
    //     "support",
    //     "video",
    // ],
    'copy_right_content' => 'Forex Trading © 2023. All Rights Reserved.',

    'support_email' => 'support@gmail.com',
    'support_phone' => '9658456982',

    'datatable_paginations' => [10, 25, 50, 100],


    'page_types' => [
        1 => "header",
        2 => "useful links",
        3 => "how funding works",
        4 => "resources",
        5 => "about us",
    ],

    'min_review_length' => '200',


    // by Aachuki
    'faq_types' => [
        1 => "new to Surgetrader",
        2 => "audition process",
        3 => "trading rules",
        4 => "funded accounts",
        5 => "platform & dashboard",
        6 => "order & billing",
        7 => "affiliate faq",
    ],

    'faq_setting_key' => [
        1 => "new_to_surgetrader",
        2 => "audition_process",
        3 => "trading_rules",
        4 => "funded_accounts",
        5 => "platform_dashboard",
        6 => "orders_and_billing",
        7 => "affiliate_faq",
    ],

    'member_types' => [
        1 => "team members",
        2 => "bkforex members",
        3 => "instgram"
    ],

    'setting_types' => [
        1  => "our story",
        2  => "who is forextrader",
        3  => "track record",
        4  => "27/7 chat room",
        5  => "trading indicators",
        6  => "live trading webinars",
        7  => "trading group access & training",
        8  => "25 rules to becoming a disciplined trader",
        9  => "forextrader at a glance",
        10 => "why is forextrader",
        11 => "our philanthropy",
    ],

    'textlength' => '200',
    'team_description_length' => '400',
    'feature_description_length' => '400',
    'titlelength' => '100',
    'testimonial_description_length' => '400',
    'winnerplacetitlelength' => '50',




    'contest_registration_length' => [
        'first_name' => '20',
        'last_name' => '20',
        'nickname' => '10',
        'trading_account_no' => '10',
    ],

    'glance_length' => [
        'title' => '140',
        'description' => '300'
    ],

    'include_manager_length' => [
        'title' => '140',
        'description' => '300'
    ],


    'banner_image_default' => [
        'home'           => 'images/banner-bg.jpg',
        'other'          => 'images/other-pages-bg.jpg',
    ],

    'section_image_default' => [

        'our_company_work'          => 'images/news-img.jpg',
        'over_the_weekend'          => 'images/hold-trades.png',
        'why_we_different'          => 'images/glob.png',
        'trader_portal'             => 'images/trader-portal.png',
        'earn_more'                 => 'images/earn-more.png',
        'trading_rules'             => 'images/img-1.png',
        'profit'                    => 'images/icons/favoritechart.svg',
        'easy'                      => 'images/icons/setting.svg',
        'fast'                      => 'images/icons/shuttle.svg',
        'support'                   => 'images/icons/callcalling.svg',
        'stoploss'                  => 'images/icons/chart.svg',
        'onetime_fee'               => 'images/icons/dollarsquare.svg',
        'two_simple_rule'           => 'images/icons/notepad2.svg',
        'start_trading'             => 'images/start-trading.png',
        'platform'                  => 'images/fixi-logo.png',
        'tech_fast'                 => 'images/icons/timerpause-white.svg',
        'tech_dashboard'            => 'images/icons/monitor.svg',
        'tech_profit'               => 'images/icons/moneysend.svg',
        'our_founder'               => 'images/meet-our-founder/founder.png',
        'who_is_urgetrader'         => 'images/img-6.png',
        'our_story'                 => 'images/about-surgetrader/our-story.png',
        'why_is_surgetrader'        => 'images/video-img.jpg',
        'bk_forex_member'           => 'images/bk-logo.png',
        'track_record'              => 'images/img-2.png',
        'chatrooms'                 => 'images/chatrooms.png',
        'our_founder_banner_one'    => 'images/meet-our-founder/bg-img.jpg',
        'school_of_forex_trading'   => 'images/img-8.png',
        'learn_forex_banner_one'    => 'images/google-adds.jpg',
        'learn_forex_banner_two'    => 'images/google-adds-1.jpg',
        'why_trade_with_us1'        => 'images/icons/1.svg',
        'why_trade_with_us2'        => 'images/icons/2.svg',
        'why_trade_with_us3'        => 'images/icons/3.svg',
        'why_trade_with_us4'        => 'images/icons/4.svg',
        'why_trade_with_us5'        => 'images/icons/5.svg',
        'why_trade_with_us6'        => 'images/icons/6.svg',
        'global_image'              => 'images/half-earth.svg',
        'philanthropy_img1'         => 'images/about-surgetrader/logo-1.png',
        'philanthropy_img2'         => 'images/about-surgetrader/logo-2.png',
        'philanthropy_img3'         => 'images/about-surgetrader/logo-3.png',
        'philanthropy_img4'         => 'images/about-surgetrader/logo-4.png',

    ],


    'tradable_asset' => [
        'window'           => 'images/icons/windows.svg',
        'website'          => 'images/icons/website.svg',
        'apple'            => 'images/icons/mac.svg',
        'android'          => 'images/icons/android.svg',
    ],

    'trader_resource' => [
        'primary_resource' => 'images/img-5.png'
    ],


    'pages'=>[
        'home'=>[
            'sections'=>[
                "package",
                "our-company-works",
                "as-seen-on",
                "over-the-weekend",
                "over-the-weekend-two",
                "forex-trader-audition-step-one",
                "forex-trader-audition-step-two",
                "why-we-different",
                "trader-portal",
                "earn-more-trading-activity",
                "What_Our_Traders_Say",
                "why_trade_with_us",
                "clear_and_simple_rules",
                "one_time_aud_fee",
                "flexible_trading",
                "easy_payout",
                "quick_customer_service",
                "instant_funding",
            ]
        ],
        
        'get-funded' =>[
            'sections'=>[
                "package",
                "trading-rules",
                "withdrawing-profits",
                "profit",
                "easy",
                "fast",
                "support",
                "earn-more-trading-activity",
            ]
        ],

        'surge-trader-audition' =>[
            'sections'=>[
                "how-it-works",
                "option-one",
                "option-two",
                "package",
                "audition_process",
            ]
        ],

        'scaling-plan'=>[
            'sections'=>[
                "how-it-works",
                "option-one",
                "option-two",
                "scale_your_account",
                "package",
            ]
        ],

        'trading-rules'=>[
            'sections'=>[
                "follow-rules",
                "stop-loss",
                "max-open-lots",
                "one-time-fee",
                "any-stratagy",
                "two-simple-rules",
                "pass-quickly",
                "account-limits",
                "max-drawdown",
                "daily-loss",
                "trading_rule_image_section",
                "earn-more-trading-activity",
            ]
        ],

        'technology'=>[
            'sections'=>[
                "platform",
                "accelerate_funded_trader",
                "tech_fast",
                "tech_dashboard",
                "tech_funding",
                "tech_profits",
                "features",
                "start_trading",
            ]
        ],

        'faq'=>[
            'sections'=>[
                "how_can_we_help",
                "new_to_surgetrader",
                "audition_process",
                "trading_rules",
                "funded_accounts",
                "platform_dashboard",
                "orders_and_billing",
                "why_trade_with_us",
                "clear_and_simple_rules",
                "one_time_aud_fee",
                "flexible_trading",
                "easy_payout",
                "quick_customer_service",
                "instant_funding",
            ]
        ],

        'affiliate'=>[
            'sections'=>[
                "best_affiliate_fees",
                "affiliate_receive_commission",
                "affiliate_high_value_transactions",
                "affiliate_regular_payouts",
                "Sign_up_for_the_surgetrader",
                "affiliate_faq",
            ]
        ],

        'our-founder'=>[
            'sections'=>[
                "meet_our_founder",
                "why_build_surgetrader",
                "instagram_user",
                "connect_on_socail_media",
                "how-it-works",
                "option-one",
                "option-two",
                "package",
            ]
        ],

        'surgetrader-team'=>[
            'sections'=>[
                "meet_the_team",
                "What_Our_Traders_Say",
            ]
        ],

        'about-surgetrader'=>[
            'sections'=>[
                "who_is_surgetrader",
                "simple_straight_forward_trading_rules",
                "one_step_evaluation",
                "no_time_limits",
                "world_class_customer_support",
                "glance",
                "our_story",
                "What_Our_Traders_Say",
                "why_is_surgeTrader",
                "our_philanthropy",
                "earn-more-trading-activity",
            ]
        ],

        'contact-us'=>[
            'sections'=>[
                'get_in_touch'
            ]
        ],

        'bk-forex-membership'=>[
            'sections'=>[
                "trading_group_access_training",
                "what_included",
                "track_record",
                "chatroom",
                "trading_indicators",
                "live_trading_webinar",
                "package",
            ]
        ],

        'news'=>[
            'sections'=>[
                "latest_surgetrader_news",
                "disciplined_trader",
            ]
        ],

        'trading-contest'=>[
            'sections'=>[
                "contest_list",
                "stay-informed-about-contest",
            ]
        ],

        'traders-resources'=>[
            'sections'=>[
                "featured",
            ]
        ],

        'traders-corner-blog'=>[
            'sections'=>[
                "our_latest_blogs",
                "disciplined_trader",
            ]
        ]

    ]

];
