<?php

namespace Unit;

use Denason\Neshan\Exceptions\NeshanException;
use Denason\Neshan\Services\StaticMapService;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Orchestra\Testbench\TestCase;


class StaticMapServiceTest extends TestCase
{
    protected StaticMapService $service;

    protected function setUp(): void
    {
        parent::setUp();

        $this->service = new StaticMapService(
            'test_api_key',
            'https://api.neshan.org/v4/statict'
        );
    }

    /** @test
     * @throws NeshanException
     */
    public function it_generates_valid_static_map_url_with_default_parameters()
    {
        $url = $this->service->generate(35.6892, 51.3890);

        $this->assertStringContainsString('https://api.neshan.org/v4/static', $url);
        $this->assertStringContainsString('key=test_api_key', $url);
        $this->assertStringContainsString('zoom=14', $url);
        $this->assertStringContainsString('width=500', $url);
        $this->assertStringContainsString('height=500', $url);
        $this->assertStringContainsString('type=dreamy', $url);
    }


    /** @test
     * @throws NeshanException
     */
    public function it_generates_static_map_url_with_custom_parameters()
    {
        $url = $this->service->generate(
            35.6892,
            51.3890,
            zoom: 16,
            width: 800,
            height: 600,
            type: 'standard-day',
            markerToken: 'abc123'
        );

        $this->assertStringContainsString('zoom=16', $url);
        $this->assertStringContainsString('width=800', $url);
        $this->assertStringContainsString('height=600', $url);
        $this->assertStringContainsString('type=standard-day', $url);
        $this->assertStringContainsString('markerToken=abc123', $url);
    }

    /** @test */
    public function it_throws_exception_for_invalid_lat_lng()
    {
        $this->expectException(NeshanException::class);
        $this->service->generate(999, 999);
    }

    /**
     * @throws NeshanException
     * @throws ConnectionException
     */
    public function test_it_fetches_image_content()
    {
        // Mock HTTP Client
        Http::fake([
            '*' => Http::response('image-binary-content', 200)
        ]);

        $image = $this->service->fetchImage('https://fake-url.com');

        $this->assertEquals('image-binary-content', $image);
    }

    /** @test */
    public function it_throws_exception_when_image_fetch_fails()
    {
        Http::fake([
            '*' => Http::response('Server Error', 500),
        ]);

        $this->expectException(NeshanException::class);
        $this->expectExceptionMessage('Failed to fetch image');

        $this->service->fetchImage('https://example.com/fail.png');
    }

    /** @test */
    public function it_accepts_lat_lng_edge_values()
    {
        $url = $this->service->generate(-90, 180);
        $this->assertStringContainsString('center=-90,180', urldecode($url));
    }

    /** @test */
    public function it_omits_marker_token_if_not_provided()
    {
        $url = $this->service->generate(35.6892, 51.3890);
        $this->assertStringNotContainsString('markerToken=', $url);
    }

    /** @test */
    /** @test */
    /** @test */
    public function it_throws_exception_when_api_key_is_invalid()
    {
        Http::fake([
            '*' => Http::response([
                'status' => 'ERROR',
                'code' => 480,
                'message' => 'API Key not found or is not valid.',
            ], 480),
        ]);

        try {
            $this->service->fetchImage('https://api.neshan.org/v4/static/some-image-url');
            $this->fail('Expected NeshanException was not thrown');
        } catch (NeshanException $e) {
            $this->assertStringContainsString('Failed to fetch image', $e->getMessage());

            // بررسی علت (Exception chaining)
            $this->assertInstanceOf(\Illuminate\Http\Client\Response::class, $e->getPrevious()?->response ?? null);
            $this->assertEquals(480, $e->getPrevious()?->getCode() ?? null);
        }
    }


    /** @test
     * @throws NeshanException
     */
    public function it_generates_arc_map_url_with_default_parameters()
    {
        $service = new StaticMapService(
            'test_api_key',
            'https://api.neshan.org/v4/static'
        );

        $url = $service->generateArcMap(
            35.6892, 51.3890, 35.7000, 51.4000
        );

        $this->assertStringContainsString('https://api.neshan.org/v4/static/arc?', $url);
        $this->assertStringContainsString('key=test_api_key', $url);
        $this->assertStringContainsString('type=standard-night', $url);
        $this->assertStringContainsString('from=51.389,35.6892', $url);
        $this->assertStringContainsString('to=51.4,35.7', $url);
        $this->assertStringContainsString('dashed=true', $url);
        $this->assertStringContainsString('color=%23FF0AA5', $url); // encoded #
    }

    /** @test
     * @throws NeshanException
     */
    public function it_generates_arc_map_url_with_custom_parameters_and_markers()
    {
        $service = new StaticMapService(
            'test_api_key',
            'https://api.neshan.org/v4/static'
        );

        $url = $service->generateArcMap(
            35.6892,
            51.3890,
            35.7000,
            51.4000,
            width: 800,
            height: 700,
            type: 'dreamy',
            dashed: false,
            color: '#00FF00',
            marker1Token: 'marker1',
            marker2Token: 'marker2'
        );

        $this->assertStringContainsString('width=800', $url);
        $this->assertStringContainsString('height=700', $url);
        $this->assertStringContainsString('type=dreamy', $url);
        $this->assertStringContainsString('dashed=false', $url);
        $this->assertStringContainsString('color=%2300FF00', $url);
        $this->assertStringContainsString('marker1Token=marker1', $url);
        $this->assertStringContainsString('marker2Token=marker2', $url);
    }

    /** @test */
    public function it_throws_exception_for_invalid_coordinates()
    {
        $this->expectException(NeshanException::class);
        $this->expectExceptionMessage('Latitude must be between -90 and 90');

        $service = new StaticMapService(
            'test_api_key',
            'https://api.neshan.org/v4/static'
        );

        $service->generateArcMap(
            200.0, // latitude نامعتبر
            51.3890,
            35.7000,
            51.4000
        );
    }

    /** @test */
    public function it_throws_exception_for_invalid_arc_parameters()
    {
        $this->expectException(NeshanException::class);
        $this->expectExceptionMessage('Width must be between 250 and 2000 pixels.');

        $service = new StaticMapService(
            'test_api_key',
            'https://api.neshan.org/v4/static'
        );

        $service->generateArcMap(
            35.6892,
            51.3890,
            35.7000,
            51.4000,
            width: -500, // عرض نامعتبر
            height: 0,
            type: 'unknown-type'
        );
    }



}
