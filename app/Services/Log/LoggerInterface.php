<?php

namespace App\Services\Log;

interface LoggerInterface
{
    public function INFO(LogDataInterface $logData): void;
    public function ERROR(LogDataInterface $logData): void;
    public function getLoggerStatus(): LoggerStatusInterface;
}
