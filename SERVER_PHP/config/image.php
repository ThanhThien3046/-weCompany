<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'driver' => 'gd',

    'SIZES' => [
        'icon'            => [35, 35],
        'logo'            => [50, 50],
        'category'        => [ 80, 80 ],
        'thumbnail'       => [150, 150],
        'medium'          => [300, 300],
        'double'          => [ 247, 510 ],
        'largest'         => [600, 600],
        'background-page' => [ 700, 145 ],
        'content'         => [ 400, 240],
        'post-thumnail-detail' => [800,500],
        'post-galleries' => [ 250, 150 ]
    ]


];

