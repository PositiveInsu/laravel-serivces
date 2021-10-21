<?php

namespace App\Services\Log\Migration;

use App\Services\Log\AbstractLogBuilder;
use App\Services\Log\LogDataInterface;

class MigrationLogBuilder extends AbstractLogBuilder
{
    private string $contextId = '';
    private string $event = '';
    private string $message = '';
    private string $trace = '';
    private string $workingTable = '';
    private array $data = [];

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

    /**
     * @param string $workingTable
     */
    public function setWorkingTable(string $workingTable): static
    {
        $this->workingTable = $workingTable;
        return $this;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): static
    {
        $this->data = $data;
        return $this;
    }

    protected function getLogData(): LogDataInterface
    {
        return new MigrationLogData($this->workingTable, $this->contextId, $this->event, $this->message, $this->trace, $this->data);
    }
}
