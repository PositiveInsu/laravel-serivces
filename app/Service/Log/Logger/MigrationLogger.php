<?php

namespace App\Service\Log\Logger;

use Library\Log\AbstractLogger;
use Library\Log\LogDataInterface;
use Library\Log\Logger\Service\ServiceLogData;

class MigrationLogger extends AbstractLogger implements MigrationLoggerInterface
{
    public function getLogFileName(): string
    {
        return "Migration";
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
