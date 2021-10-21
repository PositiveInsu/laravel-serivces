<?php

namespace App\Services\Log;

use App\Services\Log\Migration\MigrationLogger;
use App\Services\Log\Migration\MigrationLoggerInterface;
use Illuminate\Support\ServiceProvider;

class LogServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->setConfig();

        $this->app->singleton(MigrationLoggerInterface::class, MigrationLogger::class);
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
