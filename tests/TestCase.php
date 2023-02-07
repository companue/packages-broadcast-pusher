<?php

namespace Companue\BroadcastPusher\Tests;

use Companue\BroadcastPusher\Facades\BroadcastPusher;
use Companue\BroadcastPusher\Providers\PackageServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getEnvironmentSetup($app)
    {
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connection.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:'
        ]);
    }

    protected function getPackageProviders($app)
    {
        return [
            PackageServiceProvider::class
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'BroadcastPusher' => BroadcastPusher::class
        ];
    }
}
