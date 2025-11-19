<?php

namespace Denason\Neshan\Services;

use Denason\Neshan\Exceptions\NeshanException;
use Denason\Neshan\Traits\ValidatesMapParameters;
use Illuminate\Support\Facades\Http;

/**
 * Base abstract service class for Neshan API services.
 *
 * Provides common HTTP request methods and query builder.
 */
abstract class BaseNeshanService
{
    use ValidatesMapParameters;

    //BaseUrl for all services
    protected const BASE_URL = 'https://api.neshan.org';

    //EndPoint Class: StaticMapService
    protected const ENDPOINT_STATIC_MAP = '/v4/static?';
    //EndPoint Class: StaticMapService
    protected const ENDPOINT_STATIC_MAP_ARC = '/v4/static/arc?';
    //EndPoint Class: SearchService
    protected const ENDPOINT_SEARCH = '/v1/search?';
    //EndPoint Class: ReverseGeocoding
    protected const ENDPOINT_REVERSE_GEOCODING = '/v5/reverse?';

    protected const ENDPOINT_GEOCODING = '/v6/geocoding?';

    //Endpoint Class DirectionService
    protected const ENDPOINT_DIRECTION_WITH_TRAFFIC = '/v4/direction?';
    //Endpoint Class DirectionService
    protected const ENDPOINT_DIRECTION_WITHOUT_TRAFFIC = '/v4/direction/no-traffic?';

    protected const ENDPOINT_MAP_MATCHING = '/v3/map-matching';

    protected const ENDPOINT_DISTANCE = '/v1/distance-matrix?';


    protected string $apiKey;

    /**
     * Build full URL by appending endpoint to baseUrl safely.
     *
     * @param string $endpoint
     * @return string
     */

    protected function buildEndpoint(string $endpoint): string
    {
        return rtrim($this->getBaseUrl(), '/') . '/' . ltrim($endpoint, '/');
    }

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }


    /**
     * Build a URL-encoded query string from an array of parameters.
     *
     * Boolean values are converted to 'true'/'false',
     * floats are formatted with 4 decimal places,
     * and values are rawurlencoded.
     *
     * @param array<string, mixed> $params Key-value pairs for query parameters.
     * @return string Encoded query string suitable for URLs.
     */
    protected function buildQuery(array $params): string
    {
        return collect($params)->map(function ($value, $key) {
            if (is_bool($value)) {
                $value = $value ? 'true' : 'false';
            } elseif (is_float($value)) {
                $value = number_format($value, 4, '.', '');
            }

            $encodedValue = implode(',', array_map('rawurlencode', explode(',', $value)));

            return rawurlencode($key) . '=' . $encodedValue;
        })->implode('&');
    }

    /**
     * Send a simple GET request to a full URL and return the response body.
     *
     * Retries 2 times on failure and times out after 10 seconds.
     *
     * @param string $url Full URL to send the GET request to.
     * @return string Raw response body.
     *
     * @throws NeshanException On HTTP failure or unexpected errors.
     */
    protected function sendSimpleRequest(string $url): string
    {
        try {
            $response = Http::retry(2, 100)->timeout(10)->get($url);

            if ($response->failed()) {
                throw new NeshanException("Request failed with status: " . $response->status());
            }

            return $response->body();
        } catch (\Exception $e) {
            throw new NeshanException("Unexpected error occurred while requesting Neshan API.", 0, $e);
        }
    }

    /**
     * Send a GET request to an endpoint with optional query parameters and headers.
     *
     * Can return JSON-decoded array if `$asJson` is true, otherwise raw body string.
     *
     * @param string $endpoint API endpoint (full URL or relative path).
     * @param array $payload
     * @param array<string, string> $headers Optional HTTP headers.
     * @param string $method
     * @param bool $asJson Whether to decode response as JSON (default false).
     * @return string|array<string, mixed> JSON decoded array or raw response body.
     *
     * @throws NeshanException On HTTP failure or unexpected errors.
     */
    protected function sendRequest(
        string $endpoint,
        array $payload = [],
        array $headers = [],
        string $method = 'GET',
        bool $asJson = true
    ): string|array
    {
        try {
            // Merge Api-Key into headers unless already provided
            $headers = array_merge([
                'Api-Key' => $this->apiKey,
            ], $headers);

            $client = Http::withHeaders($headers)
                ->retry(2, 100)
                ->timeout(10);

            $response = match (strtoupper($method)) {
                'POST' => $client->post($endpoint, $payload),
                'PUT' => $client->put($endpoint, $payload),
                'DELETE' => $client->delete($endpoint, $payload),
                default => $client->get($endpoint, $payload),
            };

            if ($response->failed()) {
                throw new NeshanException(
                    "Request failed with status code {$response->status()}. Response: {$response->body()}",
                    $response->status()
                );
            }

            if ($asJson) {
                $jsonResponse = $response->json();
                return $this->ValidateJsonArray($jsonResponse);
            }

            return $response->body();

        } catch (\Throwable $e) {
            throw new NeshanException("Unexpected error occurred while requesting Neshan API.", 0, $e);
        }
    }





    /**
     * Get the base URL for Neshan API.
     *
     * Can be overridden in child classes for customization.
     *
     * @return string Base API URL.
     */
    protected function getBaseUrl(): string
    {
        return self::BASE_URL;
    }


}
