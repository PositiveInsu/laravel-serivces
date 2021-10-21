<?php

namespace App\Services\Log;

use App\Services\Log\Migration\MigrationLogBuilder;
use App\Services\Log\Migration\MigrationLoggerInterface;

class LogService
{
    private array $loggerList = [];

    public function __construct(
        private MigrationLoggerInterface $migrationLogger,
    ) {
        $this->loggerList[$this->migrationLogger->getLogFileName()] = $this->migrationLogger;
    }

    /**
     * @return LogBuilderInterface
     */
    public function getMigrationLogger(): MigrationLogBuilder
    {
        return new MigrationLogBuilder($this->migrationLogger);
    }

    public function getEventName(string $className, string $functionName): string
    {
        return $className.'->'.$functionName;
    }

    /**
     * @return array
     */
    public function getLoggerList(): array
    {
        return $this->loggerList;
    }
}
