<?php

namespace App\Services\Log;

interface LoggerStatusInterface
{
    public function getERRORStatus(): bool;
    public function getINFOStatus(): bool;
}
