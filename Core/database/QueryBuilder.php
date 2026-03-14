<?php

class QueryBuilder
{
  protected $pdo;

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  public function selectAll($table)
  {
    $query = $this->pdo->prepare("select * from dbo.$table");
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  public function find($table, $id)
  {
    $query = $this->pdo->prepare("SELECT * FROM dbo.$table WHERE id = ?");

    $query->execute([$id]);

    return $query->fetch(PDO::FETCH_ASSOC);
  }

  public function findBy($table, $params)
  {
    $cols = array_keys($params);
    $cols = implode(' AND ', array_map(function ($col) {
      return "{$col} = :{$col}";
    }, $cols));

    $query = $this->pdo->prepare("SELECT * FROM dbo.$table WHERE {$cols}");
    $query->execute($params);

    return $query->fetchAll(PDO::FETCH_ASSOC);
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
      $error->getMessage();
    }
  }

  public function update($table, $id, $params)
  {
    $cols = array_keys($params);
    $cols = implode(', ', array_map(function ($col) {
      return "{$col} = :{$col}";
    }, $cols));

    $sql = "UPDATE dbo.$table SET {$cols}  WHERE id = :id";
    try {
      $query = $this->pdo->prepare($sql);
      $query->execute([...$params, 'id' => $id]);
    } catch (PDOException $error) {
      $error->getMessage();
    }
  }

  public function delete($table, $id)
  {
    $sql = "DELETE FROM $table WHERE id = ?";
    try {
      $query = $this->pdo->prepare($sql);
      $query->execute([$id]);
    } catch (PDOException $error) {
      $error->getMessage();
    }
  }
}
