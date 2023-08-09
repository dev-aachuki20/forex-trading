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
        'logo' => 'images/logo.png',
        'favicon' => 'images/favicon.png',
        'short_logo' => 'images/logo-mini.png',
        'transparent_logo' => 'assets/logo/logo-transparent.png',
        'profile_image' => 'default/default-user.svg',
        'footer-logo'   => 'images/light-logo.png'
    ],

    'date_format'     => 'd-m-Y',
    'datetime_format' => 'd-m-Y H:i',
    'time_format'     => 'H:i:s',
    'search_datetime_format' => '%d-%m-%Y %H:%i',
    'search_date_format' => '%d-%m-%Y',
    'month_format' => 'F j, Y',

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

    'setting_types' => [
        "logo",
        "social media",
        "support",
        "video",
    ],
    'copy_right_content' => 'Copyright © Forex All rights reserved.',

    'support_email' => 'support@gmail.com',
    'support_phone' => '9658456982',

    'datatable_paginations' => [10, 25, 50, 100],


    'page_types' => [
        1 => "support menu",
        2 => "useful links",
        3 => "header",
        4 => "growth",
        5 => "rewards"
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
];
