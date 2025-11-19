<?php

namespace Tests\Integration;

use Denason\Neshan\Services\StaticMapService;
use Illuminate\Support\Facades\Log;
use Orchestra\Testbench\TestCase;
use PHPUnit\Framework\Attributes\Test;

class StaticMapIntegrationTest extends TestCase
{
    protected StaticMapService $service;

    protected function setUp(): void
    {
        parent::setUp();

        $apiKey = config('neshan.static_map.api_key');
        $baseUrl = config('neshan.static_map.base_url');


        echo "🔑 API Key from config: $apiKey\n";


        $this->service = new StaticMapService($apiKey, $baseUrl);
    }

    #[Test] public function it_fetches_image_content_successfully()
    {
        $url = $this->service->generate(35.6892, 51.3890);

        echo "🗺️ Generated URL: $url\n";
        Log::info('🗺️ [Test] Generated Static Map URL:', ['url' => $url]);

        $imageContent = $this->service->fetchImage($url);

        $this->assertIsString($imageContent);
        $this->assertNotEmpty($imageContent);
        $this->assertStringStartsWith("\x89PNG", $imageContent); // PNG signature
    }

    protected function getEnvironmentSetUp($app)
    {
        // بررسی مقدار env و لاگ‌گیری
        $envKey = env('NESHAN_STATIC_MAP_API_KEY');
        $envUrl = env('NESHAN_STATIC_MAP_BASE_URL');

        echo "📦 ENV API Key: $envKey\n";
        echo "🌐 ENV Base URL: $envUrl\n";

        Log::info('📦 [Env] API Key from ENV:', ['env_key' => $envKey]);
        Log::info('🌐 [Env] Base URL from ENV:', ['env_url' => $envUrl]);

        $app['config']->set('neshan.static_map.api_key', $envKey);
        $app['config']->set('neshan.static_map.base_url', $envUrl);
    }
}
