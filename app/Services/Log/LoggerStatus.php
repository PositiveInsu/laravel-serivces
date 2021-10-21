<?php

namespace App\Services\Log;

class LoggerStatus implements LoggerStatusInterface
{
    private bool $ERROR;
    private bool $INFO;

    public function __construct()
    {
        $this->ERROR = config('custom_log.error_status');
        $this->INFO = config( 'custom_log.info_status');
    }

    public function getERRORStatus(): bool
    {
        return $this->ERROR;
    }

    public function getINFOStatus(): bool
    {
        return $this->INFO;
    }

    public function setErrorStatus(bool $status): void
    {
        $this->ERROR = $status;
    }

    public function setINFOStatus(bool $status): void
    {
        $this->INFO = $status;
    }

    public function allOn(): void
    {
        $this->INFO = true;
        $this->ERROR = true;
    }

    public function allOff(): void
    {
        $this->INFO = false;
        $this->ERROR = false;
    }
}
