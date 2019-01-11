<?php

namespace Abdurrahmanriyad\LumenAuth\Facades;

use Illuminate\Support\Facades\Facade;

class LumenAuth extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'lumenauth';
    }
}