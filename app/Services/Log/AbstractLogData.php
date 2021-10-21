<?php

namespace App\Services\Log;

abstract class AbstractLogData implements LogDataInterface
{
    protected string $contextId;
    protected string $event;
    protected string $message;
    protected string $trace;
    protected array $data;

    /**
     * @param string $contextId
     * @param string $event
     * @param string $message
     * @param string $trace
     * @param array $data
     */
    public function __construct(string $contextId, string $event, string $message, string $trace, array $data)
    {
        $this->contextId = $contextId;
        $this->event = $event;
        $this->message = $message;
        $this->trace = $trace;
        $this->data = $data;
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

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}
