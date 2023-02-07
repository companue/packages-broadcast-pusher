<?php

namespace Companue\BroadcastPusher\Providers;

use Companue\BroadcastPusher\BroadcastPusher;
use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(
            $this->basePath('resources/views/'),
            'broadcast-pusher'
        );

        $this->loadMigrationsFrom(
            $this->basePath('database/migrations')
        );

        $this->loadTranslationsFrom(
            $this->basePath('lang'),
            'broadcast-pusher'
        );

        $this->loadJsonTranslationsFrom(
            $this->basePath('lang/json')
        );

        $this->publishes([
            $this->basePath('lang') => base_path('lang/vendor/broadcast-pusher')
        ], 'broadcast-pusher-translations');

        $this->publishes([
            $this->basePath('database/migrations') => database_path('migrations')
        ], 'broadcast-pusher-migrations');

        $this->publishes([
            $this->basePath('resources/views/') => resource_path('views/vendor/broadcast-pusher')
        ], 'broadcast-pusher-views');

        $this->publishes(
            [
                $this->basePath('config/broadcast-pusher.php') => base_path('config/broadcast-pusher.php')
            ],
            'broadcast-pusher-configuration'
        );

        $this->publishes([
            $this->basePath('/resources/static') => public_path('vendor/broadcast-pusher')
        ], 'broadcast-pusher-assets');
    }

    public function register()
    {
        $this->app->bind('broadcast-pusher', function () {
            return new BroadcastPusher;
        });

        $this->mergeConfigFrom($this->basePath('config/broadcast-pusher.php'), 'broadcast-pusher');
    }

    protected function basePath($path = '')
    {
        return __DIR__ . '/../../' . $path;
    }
}
