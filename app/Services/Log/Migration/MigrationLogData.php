<?php

namespace App\Services\Log\Migration;

use App\Services\Log\AbstractLogData;

class MigrationLogData extends AbstractLogData
{
    private string $workingTable;
    private array $data;

    public function __construct(string $workingTable, string $contextId, string $event, string $message, string $trace, array $data)
    {
        $this->workingTable = $workingTable;
        $this->data = $data;
        parent::__construct($contextId, $event, $message, $trace);
    }

    /**
     * @return string
     */
    public function getWorkingTable(): string
    {
        return $this->workingTable;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}
