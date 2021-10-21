<?php

namespace App\Services\Log\Migration;

use App\Services\Log\AbstractLogData;

class MigrationLogData extends AbstractLogData
{
    private string $workingTable;

    public function __construct(string $workingTable, string $contextId, string $event, string $message, string $trace, array $data)
    {
        $this->workingTable = $workingTable;
        parent::__construct($contextId, $event, $message, $trace, $data);
    }

    /**
     * @return string
     */
    public function getWorkingTable(): string
    {
        return $this->workingTable;
    }
}
