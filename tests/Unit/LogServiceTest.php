<?php

namespace Tests\Unit;

use App\Service\Log\TSMLogService;
use Illuminate\Container\Container;
use Tests\TestCase;

class LogServiceTest extends TestCase
{
    private TSMLogService $logService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->logService = Container::getInstance()->make(TSMLogService::class);
    }

    /**
    * Tests Log Info to the migration.log file
    *
    */
    public function test_canLogToMigrationFile()
    {
        // 1. Given

        // 2. When
        $this->logService->getMigrationLogBuilder()->setMigratorID("12345")->setMessage("test")->INFO();

        // 3. Then
        $this->assertTrue(true, true);
    }
}
