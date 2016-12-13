<?php 

namespace WeatherAPI;

abstract class Configs
{
    /**
     * @var string
     */
    public static $apiKey;

    /**
     * @var string
     */
    public static $apiBase = 'http://api.openweathermap.org/data/2.5/weather?%s&APPID=%s';

    /**
     * get the API key
     *
     * @return string
     */
    public static function getApiKey()
    {
        return self::$apiKey;
    }

    /**
     * set the API key
     *
     * @param string $apiKey
     */
    public static function setApiKey($apiKey)
    {
        self::$apiKey = $apiKey;
    }


    /**
     * get the API base URL
     *
     * @return string
     */
    public static function getApiBase()
    {
        return self::$apiBase;
    }
    
    /**
     * set the API base URL
     *
     * @param string $apiBase
     */
    public static function setApiBase($apiBase)
    {
        self::$apiBase = $apiBase;
    }
}


?>