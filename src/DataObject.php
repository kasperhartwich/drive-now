<?php
namespace DriveNow;

/**
 * Class DataObject
 * @package DriveNow
 */
class DataObject
{
    private $data;

    /**
     * Constructor, saves data on object
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Custom getter
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->data[$key];
    }

}