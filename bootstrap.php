<?php
require './database/connection.php';
require './database/QueryBuilder.php';

$pdo = Connection::start();
return $query = new QueryBuilder($pdo);