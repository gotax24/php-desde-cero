<?php

require 'Router.php';
$config = require './config.php';
require 'database/connection.php';
require 'database/QueryBuilder.php';
require 'functions.php';
require 'Request.php';
require 'Models/Task.php';

if ($config['error_handling']) {
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
}

$pdo = Connection::start($config['database']);
return $query = new QueryBuilder($pdo);
