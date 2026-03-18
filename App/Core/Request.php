<?php

namespace App\Core;

class Request
{
  public static function url()
  {
    $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $url = preg_replace('#^/|/$#', '', $requestUri);

    error_log("Ruta entrante: '$_SERVER[REQUEST_URI]' → procesada como: '$url'");

    return $url;
  }
}
