<?php
namespace Tests;

use DriveNow\City;

class CityTest extends TestCase
{
    public function testCountry()
    {
        $cities = $this->drivenow->getCities();
        /** @var City $city */
        $city = array_shift($cities);
        var_dump($city);
        $this->assertEquals('Germany', $city->countryLabel);
    }
}