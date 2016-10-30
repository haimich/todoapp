<?php namespace todoapp;

require_once __DIR__ . '/vendor/autoload.php';

use \todoapp\repositories\TodosRepository;
use \todoapp\models\Todo;

$klein = new \Klein\Klein();

/* GET List of all todos */
$klein->respond('GET', '/todos/', function ($request, $response) {
  error_log("GET todos");
  $response->json(json_decode('[ { "id": 1, "name": "Buy milk" }, { "id": 2, "name": "Learn php 7" } ]'));
});

/* POST a todo */
$klein->respond('POST', '/todos/', function ($request, $response) {
  error_log("POST todo");

  $todo = json_decode($request->body());
  $repo = new TodosRepository();

  try {
    $repo->createTodo(new Todo($todo->name));
    $response->code(201);
  } catch (\Exception $e) {
    error_log('Could not create todo: ' . $e->getMessage());
    $response->code(500);
  }
});

$klein->dispatch();

?>