<?php
namespace DriveNow;

/**
 * Class Client
 * @package DriveNow
 */
class Client
{
    /**
     * Request the DriveNow API
     * @param $url
     * @param $api_key
     * @return mixed
     */
    public static function request($url, $api_key)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['X-Api-Key: ' . $api_key, 'Content-Type: application/json']);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
}