<?php

namespace Library\Exception;

abstract class AbstractExceptionService implements ExceptionServiceInterface
{
    /*
     * Default Messages.
     */
    private string $MESSAGE_NULL_VALUE = "The argument must not be a null value.. Your argument is null.";
    private string $MESSAGE_INVALID_ARGUMENT = " is a expected type, but the argument is not matched. Your argument is ";

    public function runtime(string $message, bool $report = false): void
    {
        throw new CustomRuntimeException($message, $report);
    }

    public function nullValueParameter(?string $message = null): void
    {
        $message = $this->changeMessageIfNull($message, $this->MESSAGE_NULL_VALUE);
        throw new CustomRuntimeException($message);
    }

    public function invalidArgument(string $expectType, string $valueType, ?string $message = null): void
    {
        // TODO: [IJ] Design how to use debug_backtrace for exception
        debug_backtrace();
        $message = $this->changeMessageIfNull($message, $expectType.$this->MESSAGE_INVALID_ARGUMENT.$valueType);
        throw new CustomRuntimeException($message);
    }

    private function changeMessageIfNull(?string $message, string $alternativeMessage): string
    {
        if(is_null($message)){
            $message = $alternativeMessage;
        }
        return $message;
    }
}
