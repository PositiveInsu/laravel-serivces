<?php

namespace App\Services\Log;

interface LogBuilderInterface
{
    public function __construct(LoggerInterface $migrationLogger);
    public function INFO(): void;
    public function DEBUG(): void;
}
