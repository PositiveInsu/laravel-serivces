<?php

namespace App\Http\Response;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;
use Throwable;

class TSMResponseFactory extends ResponseFactory implements TSMResponseFactoryInterface
{
    public function json($data = [], $status = 200, array $headers = [], $options = 0): JsonResponse
    {
        $formatter = TSMResponseFormatter::getInstance()->setData($data);
        return new JsonResponse($formatter->getResponseData(), $status, $headers, $options);
    }

    public function exception(Throwable $e, array $headers = [], Request $request = null): JsonResponse
    {
        $formatter = TSMResponseFormatter::getInstance()->setException($e, $request);
        return new JsonResponse($formatter->getResponseError(), $formatter->getStatus(), $headers, 0);
    }
}
