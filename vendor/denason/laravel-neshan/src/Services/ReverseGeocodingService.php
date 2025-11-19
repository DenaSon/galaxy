<?php

namespace Denason\Neshan\Services;

use Denason\Neshan\Contracts\ReverseGeocodingInterface;
use Denason\Neshan\Exceptions\NeshanException;
use Illuminate\Http\Client\ConnectionException;

/**
 * Dynamically handled methods via the __call magic method for API response fields.
 * Supported dynamic getters for API response (handled via __call).
 *
 * @method string getFormattedAddress(float $lat, float $lng)
 * @method string getRouteName(float $lat, float $lng)
 * @method string getRouteType(float $lat, float $lng)
 * @method string getNeighbourhood(float $lat, float $lng)
 * @method string getCity(float $lat, float $lng)
 * @method string getState(float $lat, float $lng)
 * @method string getPlace(float $lat, float $lng)
 * @method string getMunicipalityZone(float $lat, float $lng)
 * @method bool getInTrafficZone(float $lat, float $lng)
 * @method bool getInOddEvenZone(float $lat, float $lng)
 * @method string getVillage(float $lat, float $lng)
 * @method string getCounty(float $lat, float $lng)
 * @method string getDistrict(float $lat, float $lng)
 */
class ReverseGeocodingService extends BaseNeshanService implements ReverseGeocodingInterface
{

    private array $validFields = [
        'formatted_address', 'route_name', 'route_type', 'neighbourhood',
        'city', 'state', 'place', 'municipality_zone', 'in_traffic_zone',
        'in_odd_even_zone', 'village', 'county', 'district'
    ];


    public function __construct(string $apiKey)
    {
        parent::__construct($apiKey);
    }


    /**
     * @throws NeshanException
     */
    public function getInfo(float $lat, float $lng): array
    {
        $this->validateCoordinates($lat, $lng);

        $url = $this->buildEndpoint(static::ENDPOINT_REVERSE_GEOCODING);

        return $this->sendRequest(
            $url,
            ['lat' => $lat, 'lng' => $lng]
        );
    }


    /**
     * Handle dynamic getX(float $lat, float $lng) method calls.
     *
     * @param string $method
     * @param array $parameters
     * @return mixed
     *
     * @throws NeshanException|ConnectionException
     */
    public function __call(string $method, array $parameters): mixed
    {

        if (str_starts_with($method, 'get') && count($parameters) === 2) {
            $field = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', substr($method, 3)));

            if (!in_array($field, $this->validFields, true)) {
                throw new NeshanException("Invalid field name '{$field}'. Valid fields are: " . implode(', ', $this->validFields));
            }


            $lat = $parameters[0];
            $lng = $parameters[1];

            $response = $this->getInfo($lat, $lng);

            return $response[$field]
                ?? throw new NeshanException("Field '{$field}' does not exist in the API response.");
        }

        throw new \BadMethodCallException("Method {$method} does not exist.");
    }

}
