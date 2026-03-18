<?php

namespace App\Models;

use App\Models\Model;

class Task extends Model
{
  protected $table = 'task';
  protected $color;

  public function setColor($color)
  {
    $this->color = $color;
  }
}


