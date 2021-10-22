<?php

namespace App\Providers;

use App\Service\Log\Logger\MigrationLogBuilder;
use App\Service\Log\TSMLogService;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Library\Log\AbstractLogService;
use Library\Log\Logger\Service\ServiceLoggerInterface;

class TestProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(MigrationLogBuilder::class, function($app){
            return new MigrationLogBuilder($app->make(ServiceLoggerInterface::class));
        });

        $this->app->bind(AbstractLogService::class, TSMLogService::class);
    }
}
