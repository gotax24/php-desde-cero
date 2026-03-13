<?php
$query->create('task', [
  'title' => $_POST['title'] ?? 'Sin titulo',
  'color' => $_POST['color'] ?? '#ea7676ec',
  'completed' => $_POST['completed'] ?? 0
]);

header('Location: /');