<?php
class Connection
{
  //cuando es estatico no necesita una instancia del objeto para conectarse
  public static function  start($config)
  {
    $dns = "{$config['type']}:Server={$config['server']};Database={$config['database']};TrustServerCertificate=true";

    try {
      return new PDO($dns, $config['user'], $config['password']);
    } catch (PDOException $error) {
      echo "Error de conexion: " . $error->getMessage();
    }
  }
}
