<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],


    /* đăng nhập bằng facebook */
    'facebook' => [
        'client_id' => ('467063092070275'), //client face của bạn
        'client_secret' => ('ed1b484b1ad410589f9d38490384f1df'), //client app service face của bạn
        'redirect' => ('https://thegioisach.com/websitebansach/admin/callback'), //callback trả về
        'redirect' => ('https://thegioisach.com/websitebansach/client/facebook/callback') //callback trả về
    ],
    /* đăng nhập bằng google */
    'google' => [
        'client_id' => env('GOOGLE_ID'), //client google của bạn
        'client_secret' => env('GOOGLE_SECRET'), //client app service google của bạn
        'redirect' => env('GOOGLE_URL') //callback trả về
    ],

];
