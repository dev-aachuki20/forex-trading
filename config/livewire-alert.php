<?php

/*
 * For more details about the configuration, see:
 * https://sweetalert2.github.io/#configuration
 */
return [
    'alert' => [
        'position' => 'top-end',
        'timer' => 3000,
        'toast' => true,
        'text' => null,
        'showCancelButton' => false,
        'showConfirmButton' => false,
        'timerProgressBar' => true,
    ],
    'confirm' => [
        'icon' => 'warning',
        'text' => null,
        'position' => 'center',
        'toast' => false,
        'timer' => null,
        'showConfirmButton' => true,
        'showCancelButton' => true,
        'allowOutsideClick' => false,
        'allowEscapeKey'   => false,
        'cancelButtonText' => 'No',
        'confirmButtonColor' => '#0ab39c',
        'cancelButtonColor' => '#f06548'
    ]
];
