<?php
namespace Tests;

use DriveNow\Car;

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

    public function testCarsWithLowFuel()
    {
        $cars = $this->drivenow->getCars();
        /** @var $car Car */
        foreach ($cars as $id => $car) {
            if ($car->fuelLevelInPercent>20) {
                unset($cars[$id]);
            }
            if ($car->fuelLevelInPercent==0) {
                unset($cars[$id]);
            }
        }
        $this->assertGreaterThan(0, count($cars));
    }
}