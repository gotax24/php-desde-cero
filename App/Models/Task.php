<?php
require_once __DIR__ . '/Model.php';

namespace App\Models;

class Task extends Model
{
  protected $table = 'task';

  public function setColor($color)
  {
    $this->color = $color;
  }
}


