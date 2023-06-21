<?php

$todo_name = $_POST["todo_name"] ?? "";
$todo_name = trim($todo_name);

if ($todo_name) {
  if (file_exists(__DIR__ . '/todo.json')) {
    $json = file_get_contents(__DIR__ . '/todo.json');
    $json_array = json_decode($json, true);
  } else {
    $json_array = [];
  }

  $json_array[$todo_name] = ["completed" => false];
  file_put_contents(__DIR__ . '/todo.json', json_encode($json_array, JSON_PRETTY_PRINT));
}

header("Location: index.php");
