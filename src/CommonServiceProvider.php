<?php

namespace TheComet\Common;

use Illuminate\Routing\Router;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use TheComet\Common\Support\Middleware\ViewJsonMiddleware;

// @TODO: Use only required packages instead of the full framework
class CommonServiceProvider extends ServiceProvider
{
    public function boot(Router $router)
    {
        $router->pushMiddlewareToGroup('web', ViewJsonMiddleware::class);
    }

    public function register()
    {
        Collection::macro('recursive', function () {
            return $this->map(function ($value) {
                if (is_array($value) || is_object($value)) {
                    return collect($value)->recursive();
                }
                return $value;
            });
        });
    }
}
