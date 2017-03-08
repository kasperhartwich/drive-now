<?php
namespace Tests;

class DriveNowTest extends TestCase
{
    public function testCountCars()
    {
        //We assume more than 300 cars in Copenhagen
        $this->assertGreaterThan(300, $this->drivenow->countCars());
    }

    public function testGetCountries()
    {
        $this->assertEquals(11, count($this->drivenow->getCountries()));
    }
}