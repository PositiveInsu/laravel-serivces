<?php

namespace App\Http\Controllers;

use Library\Log\AbstractLogService;

class TestController extends Controller
{

    public function __construct(
      private AbstractLogService $TSMLogService,
    ) {}

    public function test()
    {
        $test = "a";
        $this->TSMLogService->getServiceLogBuilder()->setMessage("HI!")->INFO();
        $test = "B";
    }
}
