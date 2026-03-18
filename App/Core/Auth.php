<?php

namespace App\Core;

Use App\Models\Users;

class Auth
{
 public static function tryLogin($email, $password)
  {
    $user = Users::findBy(['email' => $email]);
    if (!empty($user) && password_verify($password, $user[0]->password)) {
      $_SESSION['email'] = $user[0]->email;
      $_SESSION['name'] = $user[0]->name;
      $_SESSION['id'] = $user[0]->id;

      return true;
    }
    return false;
  }

  public static function check()
  {
    return !empty($_SESSION['id']);
  }

  public static function ifSessionStart()
  {
    if (empty(session_id())) {
      return session_start();
    }
  }

  public static function logout(){
    session_start();
    session_destroy();
  }
}
