<?php

namespace Library\Log;

interface LogBuilderInterface
{
    public function __construct(LoggerInterface $migrationLogger);
    public function INFO(): void;
    public function ERROR(): void;
}
