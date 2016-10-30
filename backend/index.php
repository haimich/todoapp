<?php namespace todoapp;

require_once __DIR__ . '/vendor/autoload.php';

use \todoapp\repositories\TodosRepository;

$klein = new \Klein\Klein();

/* GET List of all todos */
$klein->respond('GET', '/todos/', function ($request, $response) {
  error_log("GET todos");
  $response->json(json_decode('[ { "id": 1, "name": "Buy milk" }, { "id": 2, "name": "Learn php 7" } ]'));
});

/* POST a todo */
$klein->respond('POST', '/todos/', function ($request, $response) {
  error_log("POST todo");

  $todo = $request->body();

  $repo = new TodosRepository();
  
  // $response->code(201);
});

$klein->dispatch();

?>