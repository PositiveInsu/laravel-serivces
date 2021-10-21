<?php

namespace App\Services\Log\Migration;

use App\Services\Log\AbstractLogger;
use App\Services\Log\LogDataInterface;

class MigrationLogger extends AbstractLogger implements MigrationLoggerInterface
{
    protected function getLogFileName(): string
    {
        return "Migration";
    }

    protected function checkLogDataType(LogDataInterface $logData): void
    {
        if(!is_a($logData, MigrationLogData::class)){
            $this->exceptionService->invalidArgument(MigrationLogData::class, $logData::class);
        }
    }

    protected function getMessageFrom(LogDataInterface $logData): string
    {
        $logData = $this->castType($logData);
        return $logData->getContextId().$this->delimiter.
            $logData->getEvent().$this->delimiter.
            $logData->getWorkingTable().$this->delimiter.
            $logData->getMessage();
    }

    protected function getTraceMessageFrom(LogDataInterface $logData): string
    {
        $logData = $this->castType($logData);
        return $logData->getContextId().$this->delimiter.
            json_encode($logData->getData()).$this->delimiter.
            $logData->getTrace();
    }

    private function castType(MigrationLogData $logData): MigrationLogData
    {
        return $logData;
    }
}
