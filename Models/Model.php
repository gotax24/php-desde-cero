<?php
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

  protected $property;
  protected $properties = [];
  protected $table;

  public function __construct($property = [])
  {
    $this->property = $property;
  }

  public static function create($properties = [])
  {
    $model = new static($properties);
    $model->save();

    return $model;
  }

  public function buildString()
  {
    $me = new ReflectionClass($this);
    $properties = $me->getProperties();

    foreach ($properties as $value) {
      var_dump($value->name);
    }

    return "Titulo: {$this->title} \n Completo: " . ($this->completed ? 'Si' : 'No');
  }

  public function isComplete()
  {
    $this->completed = true;
  }

  public function save()
  {
    if (empty($this->table)) {
      throw new Exception("El nombre de la tabla no ha sido definido");
    }

    App::get('database')->create($this->table, $this->properties, [
      'title' => $_POST['title'] ?? 'Sin titulo',
      'color' => $_POST['color'] ?? '#ea7676ec',
      'completed' => $_POST['completed'] ?? 0
    ]);
  }
}
