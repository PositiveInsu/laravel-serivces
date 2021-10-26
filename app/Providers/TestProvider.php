<?php

namespace App\Providers;

use App\Service\Log\Logger\MigrationLogBuilder;
use App\Service\Log\Logger\MigrationLogger;
use App\Service\Log\Logger\MigrationLoggerInterface;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class TestProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(MigrationLoggerInterface::class, MigrationLogger::class);

        $this->app->bind(MigrationLogBuilder::class, function($app){
            return new MigrationLogBuilder($app->make(MigrationLoggerInterface::class));
        });
    }
}
