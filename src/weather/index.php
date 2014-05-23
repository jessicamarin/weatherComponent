<?php

namespace WeatherComponent;

    use Guzzle\Http\Client;
    use WeatherComponent\Weather\WeatherService;

    $client = new Client();

    $weatherService = new WeatherService($client);

    $weatherService->getWeather('BCN');