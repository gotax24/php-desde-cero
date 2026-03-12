<?php

class QueryBuilder
{
  protected $pdo;

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  public function selectAll($table, $class)
  {
    $query = $this->pdo->prepare("select * from dbo.$table");
    $query->execute();

    return $query->fetchAll(PDO::FETCH_CLASS, $class);
  }

  public function create($table, $params)
  {
    $cols = implode(', ', array_keys($params));
    $placeholders = ':' . implode(', :', array_keys($params));

    $sql = "INSERT INTO $table ({$cols}) VALUES ($placeholders)";
    try {
      $query = $this->pdo->prepare($sql);
      // :name
      //['name'] => '[jhon']
      $query->execute($params);
    } catch (PDOException $error) {
      dd($error->getMessage());
    }
  }

  public function update($table, $id, $params){
    $cols = array_keys($params);
    $cols = array_map(function ($col) {
      return "{$col} = :{$col}";
    }, $cols);

    $placeholders = ':' . implode(', :', array_keys($params));

    $sql = "UPDATE dbo.$table SET completed = $placeholders WHERE id = $id";
    try {
      $query = $this->pdo->prepare($sql);
      // :name
      //['name'] => '[jhon']
      $query->execute($params);
    } catch (PDOException $error) {
      dd($error->getMessage());
    }
  }
}
