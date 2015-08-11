<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mail Driver
    |--------------------------------------------------------------------------
    |
    | Laravel supports both SMTP and PHP's "mail" function as drivers for the
    | sending of e-mail. You may specify which one you're using throughout
    | your application here. By default, Laravel is setup for SMTP mail.
    |
    | Supported: "smtp", "mail", "sendmail", "mailgun", "mandrill", "ses", "log"
    |
    */

    'driver' => env('MAIL_DRIVER', 'smtp'),
    'host' => env('MAIL_HOST', 'smtp.gmail.com'),
    'port' => env('MAIL_PORT', 587),
    'from' => ['address' => 'yurickvinicius@gmail.com' , 'name' => 'YourName' ],
    'encryption' => env('MAIL_ENCRYPTION', 'tls'),
    'username' => env('yurickvinicius@gmail.com'),
    'password' => env('#####'),
    'sendmail' => '/usr/sbin/sendmail -bs',
    'pretend' => false,

];
