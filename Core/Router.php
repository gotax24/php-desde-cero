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
      $controller = $this->routes[$url][0];
      $method = $this->routes[$url][1];

      if (!class_exists($controller)) {
        throw new Exception("El controlador {$controller} no existe", 1);
      }

      if (!method_exists($controller, $method)) {
        throw new Exception("El metodo {$method} no existe", 1);
      }

      return (new $controller)->$method();
    }

    die('LA ruta no existe');
  }
}
