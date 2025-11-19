<?php

namespace Unit;

use Denason\Neshan\Exceptions\NeshanException;
use Denason\Neshan\Services\SearchService;
use Illuminate\Support\Facades\Http;
use Orchestra\Testbench\TestCase;

class SearchServiceTest extends TestCase
{
    protected SearchService $service;
    protected string $apiKey = 'fake-api-key';
    protected  $baseUrl = 'https://api.neshan.org/v1/search';

    protected function setUp(): void
    {
        parent::setUp();

        $this->service = new SearchService($this->apiKey, $this->baseUrl);
    }

    /** @test
     * @throws NeshanException
     */
    public function it_returns_results_from_find_by_coordinate()
    {
        Http::fake([
            'https://api.neshan.org/v1/search*' => Http::response([
                'count' => 1,
                'items' => [
                    [
                        'title' => 'پارک ملت',
                        'address' => 'تهران، ولیعصر',
                        'location' => ['x' => 51.3890, 'y' => 35.6892],
                        'category' => 'place',
                        'type' => 'park',
                        'region' => 'تهران',
                        'neighbourhood' => 'ولیعصر'
                    ]
                ]
            ])
        ]);

        $results = $this->service->findByCoordinate('پارک', 35.6892, 51.3890);

        $this->assertIsArray($results);
       $this->assertEquals(1, $results['count']);
        $this->assertEquals('پارک ملت', $results['items'][0]['title']);
    }

    /** @test */
    public function it_throws_exception_on_failed_http_response()
    {
        Http::fake([
            $this->baseUrl . '*' => Http::response(['message' => 'Internal Server Error'], 500),
        ]);

        $this->expectException(NeshanException::class);
        $this->expectExceptionMessage('Unexpected error occurred while requesting Neshan API.');

        $this->service->findByCoordinate('پارک', 35.0, 51.0);
    }


    /** @test */
    public function it_returns_results_for_valid_province()
    {
        Http::fake([
            'https://api.neshan.org/v1/search*' => Http::response([
                'count' => 2,
                'items' => [
                    ['title' => 'کافه ۱', 'location' => ['x' => 51.3, 'y' => 35.7]],
                    ['title' => 'کافه ۲', 'location' => ['x' => 51.4, 'y' => 35.8]]
                ]
            ])
        ]);

        $results = $this->service->findByProvince('کافه', 'تهران');

        $this->assertIsArray($results);
        $this->assertCount(2, $results['items']);
    }

    /** @test */
    public function it_throws_exception_for_invalid_province()
    {
        $this->expectException(NeshanException::class);
        $this->expectExceptionMessage("Invalid province name");

        $this->service->findByProvince('رستوران', 'خیالیستان');
    }




    /** @test */
    public function it_returns_items_with_required_fields()
    {
        Http::fake([
            'https://api.neshan.org/v1/search*' => Http::response([
                'count' => 1,
                'items' => [
                    [
                        'title' => 'پارک ملت',
                        'address' => 'تهران، ولیعصر',
                        'location' => ['x' => 51.3890, 'y' => 35.6892],
                        'category' => 'place',
                        'type' => 'park',
                        'region' => 'تهران',
                        'neighbourhood' => 'ولیعصر'
                    ]
                ]
            ])
        ]);

        $results = $this->service->findByCoordinate('پارک', 35.6892, 51.3890);

        $this->assertArrayHasKey('items', $results);
        $this->assertArrayHasKey('location', $results['items'][0]);
        $this->assertArrayHasKey('x', $results['items'][0]['location']);
        $this->assertArrayHasKey('y', $results['items'][0]['location']);
    }





}
