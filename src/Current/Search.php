<?php

namespace WeatherAPI\Current;

use WeatherAPI\Configs as Configs;

class Search
{
    /**
     * @var string
     */
    public $url = '';

    /**
     * @var string
     */
    public $q = '';

    /**
     * @var string
     */
    public $lat = '';

    /**
     * @var string
     */
    public $lon = '';

    /**
     * set params
     *
     * @param mixed $options
     */
    public function setQueryParams($options = array())
    {
        foreach($options as $key => $value){
            if(isset($this->$key))
                $this->$key = $value;
        }
    }

    /**
     * get weather by city name
     *
     * @param string $cityName
     * @return mixed
     */
    public function getWeatherByCityName($cityName)
    {
        $url = $this->url('q=' . urlencode($cityName));
        return $this->curl($url);
    }

    /**
     * get weather by geographic coordinates
     *
     * @param string $lat
     * @param string $lon
     * @return mixed
     */
    public function getWeatherByGeographicCoordinates($lat, $lon)
    {
        $url = $this->url('lat=' . $lat. '&lon='. $lon);                
        return $this->curl($url);   
    }

    /**
     * setup the url
     *
     * @param string $params
     * @return string
     */
    private function url($params)
    {
        return sprintf(Configs::getApiBase(), $params, Configs::getApiKey());
    }

    /**
     * make curl call
     *
     * @param string $url
     * @return mixed
     */
    private function curl($url)
    {
        $request = curl_init($url);
        curl_setopt($request, CURLOPT_HEADER, 0);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($request, CURLOPT_FOLLOWLOCATION, true);
        $response = (string)curl_exec($request);
        curl_close($request);
        return json_decode($response);
    }

    /**
     * api call
     *
     * @return mixed
     */
    public function execute()
    {
        if($this->q != '')
            return $this->getWeatherByCityName($this->q);

        if($this->lat != '' && $this->lon != '')
            return $this->getWeatherByGeographicCoordinates($this->lat, $this->lon);
    }
}

?>