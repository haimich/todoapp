<?php namespace todoapp\repositories;

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
  }

}

?>