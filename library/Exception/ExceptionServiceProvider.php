<?php

namespace Library\Exception;

use Illuminate\Support\ServiceProvider;

class ExceptionServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ExceptionServiceInterface::class, ExceptionService::class);
    }
}
