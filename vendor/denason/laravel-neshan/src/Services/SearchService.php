<?php

namespace Denason\Neshan\Services;

use Denason\Neshan\Contracts\SearchInterface;
use Denason\Neshan\Exceptions\NeshanException;
use Denason\Neshan\Support\IranProvinces;
use Illuminate\Http\Client\ConnectionException;


class SearchService extends BaseNeshanService implements SearchInterface
{


    /**
     * SearchService constructor.
     *
     * @param string $apiKey
     */

    public function __construct(string $apiKey)
    {

        parent::__construct($apiKey);
    }


    /**
     * {@inheritdoc}
     * @throws NeshanException
     */
    public function findByCoordinate(string $term, ?float $lat = 0, ?float $lng = 0): array
    {
        $url = $this->buildEndpoint(static::ENDPOINT_SEARCH);

        $this->validateCoordinates($lat, $lng);
        $this->validateTermString($term);

        return $this->sendRequest($url, [
            'term' => $term,
            'lat' => $lat,
            'lng' => $lng,
        ]);

    }

    /**
     * {@inheritdoc}
     * @throws NeshanException|ConnectionException
     */
    public function findByProvince(string $term, string $province): array
    {
        $this->validateTermString($term);
        $coordinate = IranProvinces::getCoordinates($province);

        if (!$coordinate) {
            throw new NeshanException("Invalid province name: '{$province}'");
        }

        return $this->findByCoordinate($term, $coordinate['lat'], $coordinate['lng']);
    }
}
