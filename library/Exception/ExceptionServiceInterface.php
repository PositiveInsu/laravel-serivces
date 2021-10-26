<?php

namespace Library\Exception;

interface ExceptionServiceInterface
{
    public function runtime(string $message): void;
    public function nullValueParameter(?string $message): void;
    public function invalidArgument(string $expectType, string $valueType, ?string $message = null): void;
}
