<?php

namespace Library\Log\Logger\Service;

use Library\Log\Logger\AbstractLogData;

class ServiceLogData extends AbstractLogData
{
    private string $userID;

    public function __construct(string $userID, string $contextId, string $event, string $message, string $trace)
    {
        parent::__construct($contextId, $event, $message, $trace);
        $this->userID = $userID;
    }

    /**
     * @return string
     */
    public function getUserID(): string
    {
        return $this->userID;
    }
}
