<?php

namespace Library\Log\Logger;

/*
 * If you implement AbstractLogBuilder, please define your variables what you made in your LogData Class in your LogBuilder implemented class .
 * Furthermore, just define the setter method in that class, not getter.
 * And return your LogData class in the getLogData() method.
 *
 */
abstract class AbstractLogBuilder implements LogBuilderInterface
{
    protected LoggerInterface $logger;
    protected string $contextId = '';
    protected string $event = '';
    protected string $message = '';
    protected string $trace = '';

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function INFO(): void{
        $logData = $this->getLogData();
        $this->logger->INFO($logData);
    }

    public function ERROR(): void{
        $logData = $this->getLogData();
        $this->logger->ERROR($logData);
    }

    protected abstract function getLogData(): LogDataInterface;

    /**
     * @param string $contextId
     */
    public function setContextId(string $contextId): static
    {
        $this->contextId = $contextId;
        return $this;
    }

    /**
     * @param string $event
     */
    public function setEvent(string $event): static
    {
        $this->event = $event;
        return $this;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): static
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @param string $trace
     */
    public function setTrace(string $trace): static
    {
        $this->trace = $trace;
        return $this;
    }
}
