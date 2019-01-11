<?php

namespace Abdurrahmanriyad\LumenAuth;

use Abdurrahmanriyad\LumenAuth\Facades\LumenAuthFacade;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

class LumenAuthServiceProvider extends ServiceProvider
{

    public function register()
    {
        if ($this->app instanceof LumenApplication) {
            $this->app->routeMiddleware(['lumenAuth' => \Abdurrahmanriyad\LumenAuth\Middleware\LumenAuthenticateMiddleware::class]);
        }

        $this->app->singleton('LumenAuthFacade', function () {
            return new LumenAuth();
        });

        if (!class_exists('JWTAuth')) {
            class_alias(LumenAuthFacade::class, 'LumenAuthFacade');
        }
    }

    public function provides()
    {
        return [
            LumenAuth::class
        ];
    }
}