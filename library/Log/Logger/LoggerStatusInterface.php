<?php

namespace Library\Log\Logger;

interface LoggerStatusInterface
{
    public function getERRORStatus(): bool;
    public function getINFOStatus(): bool;
}
