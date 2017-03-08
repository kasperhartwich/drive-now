<?php
namespace Tests;

/**
 * Class TestCase
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    const API_KEY = 'adf51226795afbc4e7575ccc124face7';

    protected $drivenow;

    public function setUp()
    {
        $this->drivenow = new \DriveNow\DriveNow(self::API_KEY);
    }

}