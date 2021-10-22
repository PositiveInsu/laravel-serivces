<?php

namespace Library\Exception;

interface ExceptionServiceInterface
{
    public function common(string $message): void;
    public function nullValue(?string $message): void;
    public function invalidArgument(string $expectType, string $valueType, ?string $message = null): void;
}
