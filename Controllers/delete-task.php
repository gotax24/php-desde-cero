<?php
App::get('database')->delete('task', $_POST['id']);

header('Location: /');