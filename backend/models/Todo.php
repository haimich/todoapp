<?php namespace todoapp\models;

class Todo {
  public $name;
  public $id;

  function __construct(string $name, $id = null) {
    $this->name = $name;
    $this->id = $id;
  }
}

?>