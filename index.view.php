<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Hola <?= $name; ?></h1>

  <h2>Completas</h2>
  <ul>
    <?php foreach ($tareasCompletas as $tarea): ?>
      <li><?= $tarea['title'] ?></li>
    <?php endforeach ?>
    <li>Estudiar</li>
    <li>PHP</li>
  </ul>
  <h2>Incompletas</h2>
  <ul>
    <?php foreach ($tareasIncompletas as $tareas): ?>
      <li><?= $tarea['title'] ?></li>
    <?php endforeach ?>
    <li>Estudiar</li>
    <li>Nodejs</li>
  </ul>
</body>

</html>