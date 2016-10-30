<?php namespace todoapp\repositories;

use \todoapp\models\Todo;

class TodosRepository {

  static $DB_HOST = '127.0.0.1';
  static $DB_USER = 'todos';
  static $DB_PW = 'todos';
  static $DB_DATABASE = 'todos';

  private $db = null;

  function __construct() {
    $this->db = mysqli_connect(
      TodosRepository::$DB_HOST,
      TodosRepository::$DB_USER,
      TodosRepository::$DB_PW,
      TodosRepository::$DB_DATABASE
    );

    mysqli_set_charset($this->db, 'utf8');
  }

  function getTodos(): array {
    error_log('get todos');

    $sql = "select * from todos";
    
    $result = mysqli_query($this->db, $sql);

    if (!$result) {
      throw new \Exception('Got no result from db');
    }

    $arr = [];

    while ($obj = mysqli_fetch_object($result)) {
      $arr[] = $obj;
    }
    
    mysqli_free_result($result);

    return $arr;
  }

  function createTodo(Todo $todo) {
    error_log('create todo: ' . $todo->name);

    $sql = "insert into todos (name, isDone) values ('$todo->name', $todo->isDone)";
    
    $result = mysqli_query($this->db, $sql);

    if (!$result) {
      throw new \Exception('Got no result from db');
    }

    return;
  }

}

?>