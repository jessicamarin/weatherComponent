<?php

use WeatherComponent\Weather\WeatherService;

require_once('vendor/autoload.php');

$client = new \Guzzle\Http\Client();

$weatherService = new WeatherService($client);

$weatherService->getWeather('BCN');