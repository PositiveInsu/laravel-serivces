<?php

namespace App\Services\Log;

abstract class AbstractLoggerStatus implements LoggerStatusInterface
{
    protected bool $ERROR;
    protected bool $INFO;

    /**
     * @param bool $ERROR
     * @param bool $INFO
     */
    public function __construct(bool $ERROR, bool $INFO)
    {
        $this->ERROR = $ERROR;
        $this->INFO = $INFO;
    }
}
