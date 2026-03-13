<?php

$tasks = $query->selectAll('task', 'Task');
$name = "Ernesto";

$tareasCompletas = array_filter($tasks, function ($task) {
  return $task->completed;
});

$tareasIncompletas = array_filter($tasks, function ($task) {
  return !$task->completed;
});

require 'Views/index.view.php';
