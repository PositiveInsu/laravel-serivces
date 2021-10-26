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
    public function setMigratorID(string $migratorID): MigrationLogBuilder
    {
        $this->migratorID = $migratorID;
        return $this;
    }

    protected function getLogData(): LogDataInterface
    {
        return new ServiceLogData($this->migratorID, $this->contextId, $this->event, $this->message, $this->trace);
    }
}
