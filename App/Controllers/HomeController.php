<?php

namespace App\Controllers;

use App\Models\Task;

class HomeController
{
  public function show()
  {
    $name = "Ernesto";

    $tasks = Task::all();

    $tareasCompletas = array_filter($tasks, function ($task) {
      return $task->completed;
    });

    $tareasIncompletas = array_filter($tasks, function ($task) {
      return !$task->completed;
    });

    return view('index', [
      'name' => $name,
      'tareasCompletas' => $tareasCompletas,
      'tareasIncompletas' => $tareasIncompletas
    ]);
  }
}
