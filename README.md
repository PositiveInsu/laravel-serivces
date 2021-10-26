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

Insert provider to the providers array in the /config/app.php
> 'providers' => [ Library\Log\LogServiceProvider::class ]

### Config file

`config.php` is In the Services\Log\Config folder. 
