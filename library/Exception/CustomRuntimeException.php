<?php

namespace Library\Exception;

use RuntimeException;
use Throwable;

class CustomRuntimeException extends RuntimeException
{
    private bool $report;

    public function __construct($message, $report = false, Throwable $previous = null)
    {
        parent::__construct($message, 0, $previous);
        $this->report = $report;
    }

    /**
     * @return bool
     */
    public function isReport(): bool
    {
        return $this->report;
    }
}
