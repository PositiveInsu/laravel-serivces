<?php

namespace App\Http\Response;

use ArrayObject;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Library\Exception\CustomRuntimeException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class TSMResponseFormatter
{
    private mixed $data = [];
    private int $status = Response::HTTP_INTERNAL_SERVER_ERROR;
    private string $errorMessage = '';
    private bool $report = true;
    private array $errorField = [];
    private string $uniqueID = '';

    private function __construct() {}

    public static function getInstance(): TSMResponseFormatter
    {
        return new TSMResponseFormatter();
    }

    public function getResponseData(): array
    {
        return [
            'data' => $this->data,
        ];
    }

    public function getResponseError(): array
    {
        return [
            'errors' => [
                'message' => $this->errorMessage,
                'fields' => $this->errorField,
                'report' => $this->report,
            ]
        ];
    }

    public function setException(Throwable $exception, Request $request = null): TSMResponseFormatter
    {
        $this->setUniqueID( $request);

        if($exception instanceof ValidationException){
            $this->convertValidationExceptionToTSMFormat($exception);
        }else if($exception instanceof AuthenticationException){
            $this->convertAuthenticExceptionToTSMFormat($exception);
        }else if($exception instanceof CustomRuntimeException){
            $this->convertCustomRuntimeExceptionToTSMFormat($exception);
        }else{
            $this->convertExceptionToTSMFormat($exception);
        }

        return $this;
    }


    public function setData(mixed $data): TSMResponseFormatter
    {
        if (null === $data) {
            $data = new ArrayObject();
        }

        $this->data = $data;

        return $this;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    private function convertValidationExceptionToTSMFormat(ValidationException $exception)
    {
        $this->errorMessage = $exception->getMessage();
        $this->errorField = $exception->errors();
        $this->status = $exception->status;
        $this->report = false;
    }

    private function convertAuthenticExceptionToTSMFormat(AuthenticationException $exception)
    {
        $this->errorMessage = $exception->getMessage();
        $this->status = Response::HTTP_UNAUTHORIZED;
    }

    private function convertCustomRuntimeExceptionToTSMFormat(CustomRuntimeException $exception)
    {
        $this->errorMessage = $exception->getMessage();
        $this->report = $exception->isReport();
    }

    private function convertExceptionToTSMFormat(CustomRuntimeException|AuthenticationException|Throwable|ValidationException $exception)
    {
        $this->errorMessage = $exception->getMessage();
        $this->status = Response::HTTP_INTERNAL_SERVER_ERROR;
    }

    private function setUniqueID(?Request $request = null): void
    {
        $uniqueID = $this->getUniqueID($request);
        if ($uniqueID) {
            $this->uniqueID = $uniqueID;
        }
    }

    private function getUniqueID(?Request $request): string|null
    {
        $uniqueID = null;
        if ($request) {
            $uniqueID = $request->get(config("app.UNIQUE_ID_KEY"));
        }
        return $uniqueID;
    }
}
