<?php

namespace Library\Log;

use Illuminate\Support\ServiceProvider;
use Library\Log\Logger\LoggerStatus;
use Library\Log\Logger\LoggerStatusInterface;
use Library\Log\Logger\Service\ServiceLogBuilder;
use Library\Log\Logger\Service\ServiceLogger;
use Library\Log\Logger\Service\ServiceLoggerInterface;

class LogServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->setConfig();

        $this->app->bind(LoggerStatusInterface::class, LoggerStatus::class);

        $this->app->bind(ServiceLoggerInterface::class, ServiceLogger::class);
        $this->app->bind(ServiceLogBuilder::class, function($app){
            return new ServiceLogBuilder($app->make(ServiceLoggerInterface::class));
        });
    }

    private function setConfig()
    {
        $this->mergeConfigFrom($this->config_path('config.php'), 'custom_log');
    }

    public function config_path($configFileName): string
    {
        return __DIR__ . '/Config/' . $configFileName;
    }
}
