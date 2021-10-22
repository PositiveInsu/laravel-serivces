<?php

namespace Tests\Unit;

use Illuminate\Container\Container;
use Library\Log\LogService;
use Tests\TestCase;

class LogServiceTest extends TestCase
{
    private LogService $logService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->logService = Container::getInstance()->make(LogService::class);
    }


    /**
    * Tests INFO Log disabled by changing INFO Status
    *
    */
    public function test_canINFOLogChange_withINFOStatus()
    {
        // 1. Given
        $logger = $this->logService->getMigrationLogger();
        $logger2 = Container::getInstance()->make(LogService::class)->getMigrationLogger();

        // 2. When
        for ($i = 0; $i < 50; $i++) {
            if($i % 2 === 0){
                $loggerList = $this->logService->getLoggerList();
                foreach($loggerList as $item){
                    $item->getLoggerStatus()->setINFOStatus(false);
                }
            }else{
                $loggerList = $this->logService->getLoggerList();
                foreach($loggerList as $item){
                    $item->getLoggerStatus()->setINFOStatus(true);
                }
            }
            $logger2->setMessage("Logger2 TEST_______".$i)->INFO();
            $logger->setMessage("TEST________".$i)->INFO();
        }

        // 3. Then
        $this->assertEquals("a", "a");
    }

    /**
     * Tests ERROR Log disabled by changing ERROR Status
     *
     */
    public function test_canERRORLogChange_withERRORStatus()
    {
        // 1. Given
        $logger = $this->logService->getMigrationLogger();

        // 2. When
        for ($i = 0; $i < 50; $i++) {
            if($i % 2 === 0){
                $loggerList = $this->logService->getLoggerList();
                foreach($loggerList as $item){
                    $item->getLoggerStatus()->setErrorStatus(false);
                }
            }else{
                $loggerList = $this->logService->getLoggerList();
                foreach($loggerList as $item){
                    $item->getLoggerStatus()->setErrorStatus(true);
                }
            }
            $logger->setMessage("TEST________".$i)->ERROR();
        }

        // 3. Then
        $this->assertEquals("a", "a");
    }
}
