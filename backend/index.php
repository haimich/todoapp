<?php

require_once __DIR__ . '/vendor/autoload.php';

$klein = new \Klein\Klein();

/* List of all todos */
$klein->respond('GET', '/todos/', function ($request, $response) {
  $response->json(json_decode('[ { "id": 1, "name": "Buy milk" }, { "id": 2, "name": "Learn php 7" } ]'));
});

$klein->dispatch();

?>