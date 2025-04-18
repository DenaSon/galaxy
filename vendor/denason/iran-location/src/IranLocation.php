<?php

namespace Denason\IranLocation;

use Denason\IranLocation\Models\Province;
use Denason\IranLocation\Models\City;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class IranLocation implements IranLocationInterface
{
    protected bool $cacheEnabled;
    protected int $cacheTtl;

    /**
     * Apply Defaults and get Configs
     */
    public function __construct()
    {
        $this->cacheEnabled = config('iran-location.cache_enabled', true);
        $this->cacheTtl = config('iran-location.cache_ttl', 86400); // 24H Default
    }

    /**
     * Caches the result of the given callback if caching is enabled.
     *
     * @param string $key
     * @param \Closure $callback
     * @return mixed
     */
    protected function cache(string $key, \Closure $callback)
    {
        if (!$this->cacheEnabled) {
            return $callback();
        }

        return Cache::remember($key, $this->cacheTtl, $callback);
    }

    /**
     * Get all provinces.
     *
     * @return Collection|Province[]
     */
    public function getProvinces(): Collection
    {
        return $this->cache('iran_location:provinces', fn() => Province::all());
    }

    /**
     * Get a province by its ID.
     *
     * @param int $id
     * @return Province|null
     */
    public function getProvinceById(int $id): ?Province
    {
        return $this->cache("iran_location:province:id:{$id}", fn() => Province::find($id));
    }

    /**
     * Get a province by its name.
     *
     * @param string $name
     * @return Province|null
     */
    public function getProvinceByName(string $name): ?Province
    {
        return $this->cache("iran_location:province:name:{$name}", fn() => Province::where('name', $name)->first());
    }

    /**
     * Get all provinces with their related cities.
     *
     * @return Collection|Province[]
     */
    public function getProvincesWithCities(): Collection
    {
        return $this->cache('iran_location:provinces_with_cities', fn() => Province::with('cities')->get());
    }

    /**
     * Get all cities.
     *
     * @return Collection|City[]
     */
    public function getCities(): Collection
    {
        return $this->cache('iran_location:cities', fn() => City::all());
    }

    /**
     * Get cities by province ID.
     *
     * @param int $provinceId
     * @return Collection|City[]
     */
    public function getCitiesByProvinceId(int $provinceId): Collection
    {
        return $this->cache("iran_location:province:{$provinceId}:cities", fn() => City::where('province_id', $provinceId)->get());
    }

    /**
     * Get cities by province name.
     *
     * @param string $provinceName
     * @return Collection|City[]
     */
    public function getCitiesByProvinceName(string $provinceName): Collection
    {
        return $this->cache("iran_location:province_name:{$provinceName}:cities", function () use ($provinceName) {
            $province = Province::where('name', $provinceName)->first();
            return $province ? $province->cities : collect();
        });
    }

    /**
     * Get a city by its ID.
     *
     * @param int $id
     * @return City|null
     */

    public function getCityById(int $id): ?City
    {
        return $this->cache("iran_location:city:id:{$id}", fn() => City::find($id));
    }



    /**
     * Get a city by its name.
     *
     * @param string $name
     * @return City|null
     */
    public function getCityByName(string $name): ?City
    {
        return $this->cache("iran_location:city:name:{$name}", fn() => City::where('name', $name)->first());
    }

    /**
     * Get the province of a given city by city ID.
     *
     * @param int $cityId
     * @return Province|null
     */
    public function getProvinceOfCityId(int $cityId): ?Province
    {
        return $this->cache("iran_location:city:{$cityId}:province", function () use ($cityId) {
            $city = City::find($cityId);
            return $city?->province;
        });
    }

    /**
     * Get the province of a given city by city name.
     *
     * @param string $cityName
     * @return Province|null
     */
    public function getProvinceOfCityName(string $cityName): ?Province
    {
        return $this->cache("iran_location:city_name:{$cityName}:province", function () use ($cityName) {
            $city = City::where('name', $cityName)->first();
            return $city?->province;
        });
    }
}
