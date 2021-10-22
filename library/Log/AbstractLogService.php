<?php

namespace Library\Log;

use Library\Log\Logger\Service\ServiceLogBuilder;

abstract class AbstractLogService
{
    public function __construct(
        private ServiceLogBuilder $serviceLogBuilder
    ){}

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
