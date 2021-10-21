<?php

namespace App\Services\Log;

abstract class AbstractLogBuilder implements LogBuilderInterface
{
    protected LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function INFO(): void{
        $logData = $this->getLogData();
        $this->logger->INFO($logData);
    }

    public function DEBUG(): void{
        $logData = $this->getLogData();
        $this->logger->DEBUG($logData);
    }

    protected abstract function getLogData(): LogDataInterface;
}
