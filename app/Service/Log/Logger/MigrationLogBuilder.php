<?php

namespace App\Service\Log\Logger;

use Library\Log\AbstractLogBuilder;
use Library\Log\LogDataInterface;
use Library\Log\Logger\Service\ServiceLogData;

class MigrationLogBuilder extends AbstractLogBuilder
{
    private string $migratorID;

    /**
     * @param string $migratorID
     */
    public function setMigratorID(string $migratorID): void
    {
        $this->migratorID = $migratorID;
    }

    protected function getLogData(): LogDataInterface
    {
        return new ServiceLogData($this->migratorID, $this->contextId, $this->event, $this->message, $this->trace);
    }
}
