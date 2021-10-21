<?php

namespace App\Services\Log;

interface LoggerStatusInterface
{
    public function getERRORStatus(): bool;
    public function getINFOStatus(): bool;
    public function setErrorStatus(bool $status): void;
    public function setINFOStatus(bool $status): void;
    public function allOn(): void;
    public function allOff(): void;
}
