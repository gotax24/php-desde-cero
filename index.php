<?php
require "vendor/autoload.php";
require 'App/Core/bootstrap.php';
$routes = require 'routes.php';

/*

$height = new Length(1, 'km');
echo $height->toUnit('m');

$RGB = new RGB(0, 255, 0);
echo $RGB->getGreen(); // 255

$converter = Factory::createConverter();
$RGB = new RGB(0, 255, 0);
El HSV::class genera un nombre de la clase en formato string ejemplo "Artack\Color\Color\HSV"
$HSV = $converter->convert($RGB, HSV::class);
no funciona este paquete o no esta documentado
echo $HSV->get() . ", " . $HSV->getSaturation() . ", " . $HSV->getValue();
*/
