<?php namespace todoapp;

require_once __DIR__ . '/vendor/autoload.php';

use \todoapp\repositories\TodosRepository;
use \todoapp\models\Todo;

$router = new \Klein\Klein();

$router->respond('GET', '/todos', function ($request, $response) {
  error_log('GET todos');

  $repo = new TodosRepository();
  $todos = $repo->getTodos();

  $response->json($todos);
});

$router->respond('POST', '/todos/', function ($request, $response) {
  error_log('POST todo');

  $todo = json_decode($request->body());
  $repo = new TodosRepository();

  try {
    $repo->createTodo(new Todo($todo->name, $todo->isDone));
    $response->code(201);
  } catch (\Exception $e) {
    error_log('Could not create todo: ' . $e->getMessage());
    $response->code(500);
  }
});

$router->respond('DELETE', '/todos/[:id]', function ($request, $response) {
  $todoId = $request->param('id');
  error_log('DELETE todo ' . $todoId);

  $repo = new TodosRepository();

  try {
    $repo->deleteTodo($todoId);
    $response->code(200);
  } catch (\Exception $e) {
    error_log('Could not delete todo: ' . $e->getMessage());
    $response->code(500);
  }
});

$router->dispatch();

?>