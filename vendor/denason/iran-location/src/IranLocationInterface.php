<?php

namespace Denason\IranLocation;

use Illuminate\Support\Collection;
use Denason\IranLocation\Models\Province;
use Denason\IranLocation\Models\City;

interface IranLocationInterface
{
    /**
     * Retrieve a list of all provinces.
     *
     * @return Collection|Province[]
     */
    public function getProvinces(): Collection;

    /**
     * Retrieve a province by its ID.
     *
     * @param int $id Province ID
     * @return Province|null
     */
    public function getProvinceById(int $id): ?Province;

    /**
     * Retrieve a province by its name.
     *
     * @param string $name Province name
     * @return Province|null
     */
    public function getProvinceByName(string $name): ?Province;

    /**
     * Retrieve all provinces along with their related cities.
     *
     * @return Collection|Province[]
     */
    public function getProvincesWithCities(): Collection;

    /**
     * Retrieve a list of all cities.
     *
     * @return Collection|City[]
     */
    public function getCities(): Collection;

    /**
     * Retrieve a list of cities by the ID of their province.
     *
     * @param int $provinceId Province ID
     * @return Collection|City[]
     */
    public function getCitiesByProvinceId(int $provinceId): Collection;

    /**
     * Retrieve a list of cities by the name of their province.
     *
     * @param string $provinceName Province name
     * @return Collection|City[]
     */
    public function getCitiesByProvinceName(string $provinceName): Collection;

    /**
     * Retrieve a city by its ID.
     *
     * @param int $id City ID
     * @return City|null
     */
    public function getCityById(int $id): ?City;

    /**
     * Retrieve a city by its name.
     *
     * @param string $name City name
     * @return City|null
     */
    public function getCityByName(string $name): ?City;

    /**
     * Retrieve the province of a given city by the city's ID.
     *
     * @param int $cityId City ID
     * @return Province|null
     */
    public function getProvinceOfCityId(int $cityId): ?Province;

    /**
     * Retrieve the province of a given city by the city's name.
     *
     * @param string $cityName City name
     * @return Province|null
     */
    public function getProvinceOfCityName(string $cityName): ?Province;
}
