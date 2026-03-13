<?php
require './functions.php';
$query = require 'bootstrap.php';

$query->delete('task', $_POST['id']);

header('Location: index.php');