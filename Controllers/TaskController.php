<?php

class TaskController
{
  public function create()
  {
    App::get('database')->create('task', [
      'title' => $_POST['title'] ?? 'Sin titulo',
      'color' => $_POST['color'] ?? '#ea7676ec',
      'completed' => $_POST['completed'] ?? 0
    ]);


    return redirect('/');
  }

  public function toggle()
  {
    $task = Task::find($_POST['id']);
    $task->update([
      'completed' => $_POST['completed']
    ]);

    return redirect('/');
  }

  public function delete()
  {
    $task = Task::find($_POST['id']);
    $task->delete();

    return redirect('/');
  }
}
