<?php

namespace App\Services\Log;

abstract class AbstractLogData implements LogDataInterface
{
    protected string $contextId;
    protected string $event;
    protected string $message;
    protected string $trace;

    /**
     * @param string $contextId
     * @param string $event
     * @param string $message
     * @param string $trace
     */
    public function __construct(string $contextId, string $event, string $message, string $trace)
    {
        $this->contextId = $contextId;
        $this->event = $event;
        $this->message = $message;
        $this->trace = $trace;
    }

    /**
     * @return string
     */
    public function getContextId(): string
    {
        return $this->contextId;
    }

    /**
     * @return string
     */
    public function getEvent(): string
    {
        return $this->event;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getTrace(): string
    {
        return $this->trace;
    }
}
