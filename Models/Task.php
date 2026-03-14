<?php
require_once __DIR__ . '/Model.php';

#[AllowDynamicProperties]

class Task extends Model
{
  protected $table = 'task';

  public function setColor($color)
  {
    $this->color = $color;
  }
}


