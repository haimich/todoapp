<?php namespace todoapp;

require_once __DIR__ . '/vendor/autoload.php';

use \todoapp\repositories\TodosRepository;
use \todoapp\models\Todo;

$router = new \Klein\Klein();

/* GET List of all todos */
$router->respond('GET', '/todos/', function ($request, $response) {
  error_log("GET todos");

  $repo = new TodosRepository();
  $todos = $repo->getTodos();

  $response->json($todos);
});

/* POST a todo */
$router->respond('POST', '/todos/', function ($request, $response) {
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

$router->dispatch();

?>