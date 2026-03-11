<?php
class Connection
{
  //cuando es estatico no necesita una instancia del objeto para conectarse
  public static function  start()
  {

    $server = "sql_server_2019";
    $database = "prueba";
    $user = "sa";
    $password = "PasswordFuerte123!";

    $dns = "sqlsrv:Server=$server;Database=$database;TrustServerCertificate=true";

    try {
      return new PDO($dns, $user, $password);
    } catch (PDOException $error) {
      echo "Error de conexion: " . $error->getMessage();
    }
  }
}
