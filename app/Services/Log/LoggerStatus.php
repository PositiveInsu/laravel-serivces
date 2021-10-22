<?php

namespace App\Services\Log;

class LoggerStatus implements LoggerStatusInterface
{
    private bool $ERROR;
    private bool $INFO;

    public function __construct()
    {
        $this->ERROR = true;
        $this->INFO = true;
    }

    public function getERRORStatus(): bool
    {
        return $this->ERROR;
    }

    public function getINFOStatus(): bool
    {
        return $this->INFO;
    }
}
