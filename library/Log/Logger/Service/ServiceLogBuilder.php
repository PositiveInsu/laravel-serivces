<?php

namespace Library\Log\Logger\Service;

use Library\Log\AbstractLogBuilder;
use Library\Log\LogDataInterface;

class ServiceLogBuilder extends AbstractLogBuilder
{
    private string $userID;

    /**
     * @param string $userID
     */
    public function setUserID(string $userID): void
    {
        $this->userID = $userID;
    }


    protected function getLogData(): LogDataInterface
    {
        return new ServiceLogData($this->userID, $this->contextId, $this->event, $this->message, $this->trace);
    }
}
