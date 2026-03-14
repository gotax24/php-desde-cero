<?php
require 'database/connection.php';
require 'database/QueryBuilder.php';
require 'Models/Users.php';
require 'Models/Task.php';
require 'Router.php';
require 'functions.php';
require 'Request.php';
require 'App.php';
require 'Auth.php';

App::set('config', require 'config.php');

App::set('database', new QueryBuilder(Connection::start(App::get('config')['database'])));

if (App::get('config')['error_handling']) {
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
}
