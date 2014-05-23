<?php

namespace WeatherComponent\Weather;

use Guzzle\Http\ClientInterface;

class WeatherService
{
    /** @var ClientInterface */
    private $httpClient;

    public function __construct(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getWeather($cityId)
    {
        $xml = $this->getWeatherXML($cityId);
        $weatherObject = $this->constructWeatherObject($xml);
    }

    private function getWeatherXML($cityId)
    {
        $url = 'http://weather.yahooapis.com/forecastrss?w='.$cityId.'&u=c';

        $res = $this->httpClient->get($url);

        if ($res->getStatusCode() != 200) {
            throw new \Exception('Service not available');
        }
        return $res->getXml();
    }

    private function constructWeatherObject(\SimpleXMLElement $xml)
    {
        $weatherObject = new Weather();

        /** @var \SimpleXMLElement $item */
        $item = $xml->xpath('/channel/item/yweather:condition');

        if (!$item) {
            throw new \Exception('City not found');
        }
    }

}
 