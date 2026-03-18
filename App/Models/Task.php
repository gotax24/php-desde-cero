<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  public $timestamps = false;
  
  protected $color;
  protected $fillable = [
    'title',
    'color',
    'completed'
  ];

  public function setColor($color)
  {
    $this->color = $color;
  }
}
