<?php

Auth::tryLogin($_POST['email'], $_POST['password']);

if (Auth::check()) {
  header('Location: /');
  exit();
}

header('Location: /login-form');
exit();
