<?php

namespace Library\Log;

use Illuminate\Container\Container;
use Library\Log\Logger\Service\ServiceLogBuilder;

abstract class AbstractLogService
{
    private ServiceLogBuilder $serviceLogBuilder;
    public function __construct(){
        $this->serviceLogBuilder = Container::getInstance()->make(ServiceLogBuilder::class);
    }

    /**
     * @return ServiceLogBuilder
     */
    public function getServiceLogBuilder(): ServiceLogBuilder
    {
        return $this->serviceLogBuilder;
    }

    public function getEventNameFromClassAndFunction(string $className, string $functionName): string
    {
        return $className.'->'.$functionName;
    }
}
