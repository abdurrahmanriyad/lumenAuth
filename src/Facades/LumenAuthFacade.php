<?php

namespace Abdurrahmanriyad\LumenAuth\Facades;

use Illuminate\Support\Facades\Facade;

class LumenAuthFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'lumenauthfacade';
    }
}