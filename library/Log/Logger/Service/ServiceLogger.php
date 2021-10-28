<?php

namespace Library\Log\Logger\Service;


use Library\Log\Logger\AbstractLogger;
use Library\Log\Logger\LogDataInterface;

class ServiceLogger extends AbstractLogger implements ServiceLoggerInterface
{
    public function getLogFileName(): string
    {
        return "Service";
    }

    protected function checkLogDataType(LogDataInterface $logData): void
    {
        if(!is_a($logData, ServiceLogData::class)){
            $this->exceptionService->invalidArgument(ServiceLogData::class, $logData::class);
        }
    }

    protected function getMessageFrom(LogDataInterface $logData): string
    {
        $logData = $this->castType($logData);
        return $logData->getContextId().$this->delimiter.
            $logData->getUserID().$this->delimiter.
            $logData->getEvent().$this->delimiter.
            $logData->getMessage();
    }

    protected function getTraceMessageFrom(LogDataInterface $logData): string
    {
        $logData = $this->castType($logData);
        return $logData->getContextId().$this->delimiter.
            $logData->getTrace();
    }

    private function castType(ServiceLogData $logData): ServiceLogData
    {
        return $logData;
    }
}
