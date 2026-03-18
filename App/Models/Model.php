<?php

namespace App\Models;

use App\Core\App;
use Exception;

class Model
{
  /* forma vieja de hacerlo   
  public $title;
  public $completed;
  
  //este metodo siempre se crea cuando hacer un new metodo viejo
  public function __construct($title , $completed = false) {
    $this->title = $title;
    $this->completed = $completed;
  }
  */

  //(Constructor propertypromotion) forma nueva
  //public function __construct(
  //public $title = '',
  //public $completed = false
  //) {}

  protected $properties = [];
  protected $table;

  public function __construct($properties = [])
  {
    $this->properties = $properties;
  }

  public static function create($properties = [])
  {
    $model = new static($properties);
    $model->save();

    return $model;
  }

  public static function all()
  {
    $model = new static;
    $rows = App::get('database')->selectAll($model->getTable());
    
    return array_map(fn($row) => new static($row), $rows);
  }

  public function update($properties)
  {
    App::get('database')->update($this->getTable(), $this->properties['id'], $properties);
    $this->setPropierties($properties);

    return $this;
  }

  public function delete()
  {
    App::get('database')->delete($this->getTable(), $this->properties['id']);

    return $this;
  }


  public static function find($id)
  {
    $model = new static;
    $properties = App::get('database')->find($model->getTable(), $id);
    $model->setPropierties($properties);

    return $model;
  }

  public static function findBy($params)
  {
    $model = new static;
    $rows = App::get('database')->findBy($model->getTable(), $params);
    
    return array_map(fn($row) => new static($row), $rows);
  }

  public function save()
  {
    if (empty($this->table)) {
      throw new Exception("El nombre de la tabla no ha sido definido", 1);
    }

    App::get('database')->create($this->table, $this->properties, [
      'title' => $_POST['title'] ?? 'Sin titulo',
      'color' => $_POST['color'] ?? '#ea7676ec',
      'completed' => $_POST['completed'] ?? 0
    ]);
  }

  public function getTable()
  {
    return $this->table;
  }

  public function setPropierties($properties)
  {
    $this->properties = array_merge($this->properties, $properties);
  }

  //metodo magico 
  public function __get($name){
    if(array_key_exists($name, $this->properties)){
      return $this->properties[$name];
    }

    throw new Exception("La propiedad $name no existe ", 1);
    
    return null;
  }
}
