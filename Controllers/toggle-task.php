<?php
App::get('database')->update('task', $_POST['id'], [
  'completed' => $_POST['completed']
]);

header('Location: /');