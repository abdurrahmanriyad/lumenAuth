<?php

namespace Abdurrahmanriyad\LumenAuth;

use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

class LumenAuthServiceProvider extends ServiceProvider
{

    public function boot()
    {
        if ($this->app instanceof LumenApplication) {
            $this->app->routeMiddleware(['lumenAuth' => \Abdurrahmanriyad\LumenAuth\Middleware\LumenAuthenticateMiddleware::class]);
        }
    }
}