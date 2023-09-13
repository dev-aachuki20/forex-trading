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
    'app_name' => 'Forex Trading',
    // 'app_mode' => env('APP_MODE', 'staging'),
    // 'owner_email_id' => 'rohithelpfullinsight@gmail.com',

    'default' => [
        'logo'             => 'admin/png/logo-light.png',
        'favicon'          => 'images/favicon.png',
        'short_logo'       => 'images/logo-mini.png',
        'transparent_logo' => 'assets/logo/logo-transparent.png',
        'profile_image'    => 'default/default-user.svg',
        'footer-logo'      => 'admin/png/logo-light.png'
    ],

    'date_format'     => 'd-m-Y',
    'month_year_format'     => 'm/Y',
    'datetime_format' => 'd-m-Y H:i',
    'time_format'     => 'H:i:s',
    'search_datetime_format' => '%d-%m-%Y %H:%i',
    'search_date_format' => '%d-%m-%Y',
    'month_format' => 'F j, Y',
    'date_month_format' => 'j-F-Y',

    'set_timezone' => 'Asia/kolkata', // set timezone

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
        1 => "new to forexTrader",
        2 => "audition process",
        3 => "trading rules",
        4 => "funded accounts",
        5 => "platform & dashboard",
        6 => "order & billing",
    ],

    'faq_setting_key' => [
        1 => "new_to_surgetrader",
        2 => "audition_process",
        3 => "trading_rules",
        4 => "funded_accounts",
        5 => "platform_dashboard",
        6 => "orders_and_billing",
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
    'titlelength' => '100',

    'banner_image_default' => [
        'home'           => 'images/banner-bg.jpg',
        'other'          => 'images/other-pages-bg.jpg',
    ],

    'section_image_default' => [

        'our_company_work'  => 'images/news-img.jpg',
        'over_the_weekend'  => 'images/hold-trades.png',
        'why_we_different'  => 'images/glob.png',
        'trader_portal'     => 'images/trader-portal.png',
        'earn_more'         => 'images/earn-more.png',
        'trading_rules'     => 'images/img-1.png',
        'profit'            => 'images/icons/favoritechart.svg',
        'easy'              => 'images/icons/setting.svg',
        'fast'              => 'images/icons/shuttle.svg',
        'support'           => 'images/icons/callcalling.svg',
        'stoploss'          => 'images/icons/chart.svg',
        'onetime_fee'       => 'images/icons/dollarsquare.svg',
        'two_simple_rule'   => 'images/icons/notepad2.svg',
        'img_1'             => 'images/img-1.png',
        'start_trading'     => 'images/start-trading.png',
        'platform'          => 'images/fixi-logo.png',
        'tech_fast'         => 'images/icons/timerpause-white.svg',
        'tech_dashboard'    => 'images/icons/monitor.svg',
        'tech_profit'       => 'images/icons/moneysend.svg',
        'our_founder'       => 'images/meet-our-founder/founder.png',
        'who_is_urgetrader' => 'images/img-6.png',
        'our_story'         => 'images/about-surgetrader/our-story.png',
        'why_is_surgetrader' => 'images/video-img.jpg',
        'bk_forex_member'   => 'images/bk-logo.png',
        'track_record'      => 'images/img-2.png',
        'chatrooms'         => 'images/chatrooms.png',
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

    ],


    'tradable_asset' => [
        'window'           => 'images/icons/windows.svg',
        'website'          => 'images/icons/website.svg',
        'apple'            => 'images/icons/mac.svg',
        'android'          => 'images/icons/android.svg',
    ],


];
