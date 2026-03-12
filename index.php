<?php


require './segundo-modulo/Models/Task.php';
$query = require './bootstrap.php';

$tasks = $query->selectAll('task', 'Task');
$name = "Ernesto";

$tareasCompletas = array_filter($tasks, function ($task) {
  return $task->completed;
});

$tareasIncompletas = array_filter($tasks, function ($task) {
  return !$task->completed;
});

require './primer-modulo/index.view.php';
