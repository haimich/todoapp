<?php namespace todoapp\models;

class Todo {
  public $name;
  public $isDone;
  public $id;

  function __construct(string $name, bool $isDone = false, $id = null) {
    $this->name = $name;
    $this->isDone = $isDone;
    $this->id = $id;
  }
}

?>