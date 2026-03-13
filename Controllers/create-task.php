<?php
require './functions.php';
$query = require 'bootstrap.php';

$query->create('task', [
  'title' => $_POST['title'] ?? 'Sin titulo',
  'color' => $_POST['color'] ?? '#ea7676ec',
  'completed' => $_POST['completed'] ?? 0
]);

$query->update('task', $_POST['id'], [
  'completed' => $_POST['completed']
]);

header('Location: index.php');