<?php
namespace Tests;

use DriveNow\Car;

class CarTest extends TestCase
{
    public function testCarTransmission()
    {
        $cars = $this->drivenow->getCars();
        /** @var Car $car */
        $car = array_pop($cars);
        $this->assertEquals('A', $car->transmission);
    }

    public function testInnerCleanliness()
    {
        $types = [];
        /** @var Car $car */
        foreach ($this->drivenow->getCars() as $car) {
            // Check if cleanliness status is a constant we have
            $this->assertContains($car->innerCleanliness, [
                Car::INNER_CLEANLINESS_VERY_CLEAN,
                Car::INNER_CLEANLINESS_CLEAN,
                Car::INNER_CLEANLINESS_REGULAR,
                Car::INNER_CLEANLINESS_POOR,
            ]);
            if (!in_array($car->innerCleanliness, $types)) {
                $types[] = $car->innerCleanliness;
            }
        }
        // Assert we pick up a known constant
        $this->assertContains(Car::INNER_CLEANLINESS_CLEAN, $types);
    }
}