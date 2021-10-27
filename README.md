## Laravel Services

Custom Services for laravel

### Setup
Insert Library namespace to the composer.json

> "autoload": {
>     "psr-4": {
>         "Library\\": "library/",
>     }
> }

## Exception Service

### Setup

Insert provider to the providers array in the /config/app.php

> 'providers' => [ Library\Exception\ExceptionServiceProvider::class ]

## Log Service

### Setup

1. Insert provider to the providers array in the /config/app.php
> 'providers' => [ Library\Log\LogServiceProvider::class ]
2. Make the CustomLogService on your own with extending AbstractLogService class.
> class TSMLogService extends AbstractLogService

### Config file for Log Service

`config.php` is In the Services\Log\Config folder. 
