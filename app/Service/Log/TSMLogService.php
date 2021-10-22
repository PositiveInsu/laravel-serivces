<?php

namespace App\Service\Log;

use App\Service\Log\Logger\MigrationLogBuilder;
use Library\Log\AbstractLogService;

class TSMLogService extends AbstractLogService
{
    public function __construct(
        private MigrationLogBuilder $migrationLogBuilder
    ){
        parent::__construct();
    }

    public function getMigrationLogBuilder(): MigrationLogBuilder
    {
        return $this->migrationLogBuilder;
    }
}
