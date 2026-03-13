<?php

class Router
{

  protected $routes = [];

  public function register($routes)
  {
    foreach ($routes as $key => $value) {
        // Normalizar clave: trim + quitar barras extras + minúsculas (opcional)
        $cleanKey = trim($key);
        $cleanKey = preg_replace('#^/|/$#', '', $cleanKey);
        $this->routes[$cleanKey] = $value;
    }
  }

  public function handle($url)
  {
    if (array_key_exists($url, $this->routes)) {
      return $this->routes[$url];
    }

    die('LA ruta no existe');
  }
}
