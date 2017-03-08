<?php
namespace DriveNow;

/**
 * Class DriveNow
 * @package DriveNow
 */
class DriveNow
{
    const CITY_MUNICH = 4604;
    const CITY_BERLIN = 6099;
    const CITY_DUSSELDORF = 1293;
    const CITY_COLOGNE = 1774;
    const CITY_HAMBURG = 40065;
    const CITY_VIENNA = 40468;
    const CITY_LONDON = 40758;
    const CITY_COPENHAGEN = 41369;
    const CITY_STOCKHOLM = 42128;
    const CITY_BRUSSELS = 42619;
    const CITY_MILANO = 42756;

    private $city_id;
    private $api_key;
    private $cache;
    private $city_cache;

    /**
     * DriveNow constructor.
     * DriveNow constructor.
     * @param string $api_key
     * @param int|null $city
     */
    public function __construct(string $api_key, integer $city = null)
    {
        $this->api_key = $api_key;
        //Default city is Copenhagen
        $this->city_id = $city ?: self::CITY_COPENHAGEN;
        $this->refreshCity();
    }

    /**
     * Refresh city cache
     */
    public function refreshCity()
    {
        $output = Client::request('https://api2.drive-now.com/cities/' . $this->city_id . '?expand=full', $this->api_key);
        $this->cache = json_decode($output, true);
    }

    /**
     * Handle to get the raw data
     * @return mixed
     */
    public function getData()
    {
        return $this->cache;
    }

    /**
     * Get array with cars
     * @return array
     */
    public function getCars()
    {
        $cars = [];
        foreach ($this->cache['cars']['items'] as $item) {
            $cars[] = new Car($item);
        }
        return $cars;
    }

    /**
     * Get the amount of cars in the given city
     * @return integer
     */
    public function countCars()
    {
        return $this->cache['cars']['count'];
    }

    /**
     * Recieve cities supported by Drive Now
     * @return array
     */
    public function getCities()
    {
        $output = Client::request('https://api2.drive-now.com/cities?expand=cities', $this->api_key);
        $this->city_cache = json_decode($output, true);

        $cities = [];
        foreach ($this->city_cache['items'] as $item) {
            $cities[] = new City($item);
        }
        return $cities;
    }

}