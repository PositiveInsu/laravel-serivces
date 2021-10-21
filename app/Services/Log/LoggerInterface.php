<?php

namespace App\Services\Log;

interface LoggerInterface
{
    public function INFO(LogDataInterface $logData): void;
    public function DEBUG(LogDataInterface $logData): void;
}
