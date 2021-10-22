<?php

namespace Library\Log;

interface LoggerStatusInterface
{
    public function getERRORStatus(): bool;
    public function getINFOStatus(): bool;
}
