<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '254430308402297',
        'client_secret' => 'bcb91226270b53c217a9573805569ac7',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

    'twitter' => [
        'client_id' => 'IydHPJ5NiGHwKIytcz0w6dCO3',
        'client_secret' => 'kD9leMrrTjT9I7oNPVH9HEdEm8XHEPCbLGZkkxqWx4xOeMYUw2',
        'redirect' => 'http://localhost:8000/auth/twitter/callback',
    ],

    'github' => [
        'client_id' => 'afe3927bf892a51f7036',
        'client_secret' => '270bda3db0028a89f9e89d547a76773dbbb54b77',
        'redirect' => 'http://localhost:8000/auth/github/callback',
    ],

];
