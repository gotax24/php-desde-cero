<?php
$name = "Ernesto";

$tasks = Task::all();

$tareasCompletas = array_filter($tasks, function ($task) {
  return $task->completed;
});

$tareasIncompletas = array_filter($tasks, function ($task) {
  return !$task->completed;
});

require 'Views/index.view.php';
