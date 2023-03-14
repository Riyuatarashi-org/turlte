<?php

declare(strict_types = 1);

use Illuminate\Support\Env;

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
        'domain' => Env::get('MAILGUN_DOMAIN'),
        'secret' => Env::get('MAILGUN_SECRET'),
        'endpoint' => Env::get('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => Env::get('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => Env::get('AWS_ACCESS_KEY_ID'),
        'secret' => Env::get('AWS_SECRET_ACCESS_KEY'),
        'region' => Env::get('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
];
