<?php

namespace Tests\Unit;

use App\Http\Response\TSMResponseFactory;
use App\Http\Response\TSMResponseFactoryInterface;
use Psy\Exception\RuntimeException;
use Tests\TestCase;

class TSMResponseFactoryTest extends TestCase
{
    private TSMResponseFactory $response;

    protected function setUp(): void
    {
        parent::setUp();
        $this->response = $this->app->make(TSMResponseFactoryInterface::class);
    }

    /**
    * Tests return JsonResponse with sample data array
    *
    */
    public function test_canReturnJsonResponse_withSampleDataArray()
    {
        // 1. Given
        $sampleData = [
            "TESTER" => "AVENUE4"
        ];

        // 2. When
        $result = $this->response->json($sampleData);

        // 3. Then
        $this->assertObjectHasAttribute("data", $result->getData());
        $this->assertStringContainsString("TESTER", $result->getContent());
        $this->assertStringContainsString("AVENUE4", $result->getContent());
    }

    /**
     * Tests return JsonResponse with sample string
     *
     */
    public function test_canReturnJsonResponse_withSampleString()
    {
        // 1. Given
        $sampleData = "AVENUE4";

        // 2. When
        $result = $this->response->json($sampleData);

        // 3. Then
        $this->assertObjectHasAttribute("data", $result->getData());
        $this->assertStringContainsString("AVENUE4", $result->getContent());
    }

    /**
     * Tests return JsonResponse with sample boolean
     *
     */
    public function test_canReturnJsonResponse_withSampleBoolean()
    {
        // 1. Given
        $sampleData = true;

        // 2. When
        $result = $this->response->json($sampleData);

        // 3. Then
        $this->assertObjectHasAttribute("data", $result->getData());
        $this->assertStringContainsString("true", $result->getContent());
    }

    /**
     * Tests return JsonResponse with sample boolean
     *
     */
    public function test_canReturnJsonResponse_withNullValue()
    {
        // 1. Given

        // 2. When
        $result = $this->response->json(null);

        // 3. Then
        $this->assertObjectHasAttribute("data", $result->getData());
    }

    /**
    * Tests return JsonResponse with Exception
    *
    */
    public function test_canReturnJsonResponse_withException()
    {
        // 1. Given

        // 2. When
        $result = $this->response->exception(new RuntimeException("AVENUE4"));

        // 3. Then
        $this->assertObjectHasAttribute("errors", $result->getData());
        $this->assertStringContainsString("AVENUE4", $result->getContent());
    }
}
