<?php

namespace App\Http\Response;

use Illuminate\Contracts\Routing\ResponseFactory as FactoryContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

interface TSMResponseFactoryInterface extends FactoryContract
{
    /**
     * Create a new JSON response instance.
     *
     * @param  Throwable  $e
     * @param  array  $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function exception(Throwable $e, array $headers = [],  Request $request = null): JsonResponse;
}
