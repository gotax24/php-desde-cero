<?php
require './functions.php';
$query = require 'bootstrap.php';



$query->update('task', $_POST['id'], [
  'completed' => $_POST['completed']
]);

header('Location: index.php');