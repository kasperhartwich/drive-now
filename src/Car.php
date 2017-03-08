<?php
namespace DriveNow;

/**
 * Class Car
 * @property string $id
 * @property string $name
 * @property string $licensePlate
 *
 * @property array $address
 * @property float $latitude
 * @property float $longitude
 *
 * @property integer $estimatedRange
 * @property float $fuelLevel
 * @property integer $fuelLevelInProcent
 * @property string $fuelType
 * @property string $innerCleanliness
 * @property boolean $isCharging
 * @property boolean $isInParkingSpace
 * @property string $parkingSpaceId
 * @property boolean $isPreheatable
 * @property string $isOfferDrivePriceActive
 *
 * @property string $make
 * @property string $modelIdentifier
 * @property string $modelName
 * @property string $color
 * @property array $equipment
 * @property string $group
 * @property string $routingModelName
 * @property string $series
 * @property string $transmission
 * @property string $variant
 *
 * @property Price $drivePrice
 * @property Price $rentalPrice
 * @property Price $parkPrice
 *
 * @package DriveNow
 */
class Car extends DataObject
{
    const INNER_CLEANLINESS_VERY_CLEAN = 'VERY_CLEAN';
    const INNER_CLEANLINESS_CLEAN = 'CLEAN';
    const INNER_CLEANLINESS_REGULAR = 'REGULAR';
    const INNER_CLEANLINESS_POOR = 'POOR';

    protected $objects = [
        'rentalPrice' => Price::class,
        'parkPrice' => Price::class,
        'paidReservationPrice' => Price::class,
    ];

}
