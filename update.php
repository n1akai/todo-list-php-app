<?php

$todo_name = $_POST["todo_name"] ?? "";
$todo_name = trim($todo_name);

if ($todo_name) {
  $todos = json_decode(file_get_contents(__DIR__ . "/todo.json"), true);

  $todos[$todo_name]["completed"] = !$todos[$todo_name]["completed"];

  file_put_contents(__DIR__ . "/todo.json", json_encode($todos, JSON_PRETTY_PRINT));
}

header("Location: index.php");
