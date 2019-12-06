<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    protected $except = [
        'auto0',
        'auto1',
        'auto2',
        'auto3',
        'auto4',
        'auto5',
        'auto6',
        'auto7',
        'auto8',
        'auto9',
        'v',
        "load"
    ];
}
