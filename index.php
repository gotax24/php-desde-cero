<?php

require 'Models/Task.php';
$query = require 'Core/bootstrap.php';

$routes =[
  '' => __DIR__ . '/Controllers/index.php',
  'about' => __DIR__ . '/Controllers/about.php',
  'contact' => __DIR__ . '/Controllers/contact.php',
  'services' => __DIR__ . '/Controllers/services.php',
];

// 1. Extraer solo la ruta (sin query, sin fragmento, sin barra final/inicial)
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url = preg_replace('#^/|/$#', '', $requestUri);

error_log("Ruta entrante: '$_SERVER[REQUEST_URI]' → procesada como: '$url'");

$router = new Router;
$router ->register($routes);
require $router -> handle($url);