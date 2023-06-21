<?php

$todos = [];
if (file_exists(__DIR__ . "/todo.json")) {
  $todos = json_decode(file_get_contents(__DIR__ . "/todo.json"), true);
}

?>

<!doctype html>
<html lang="en">

<head>
  <title>Todo APP</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <style>
    input[type="checkbox"] {
      position: relative;
      appearance: none;
      outline: none;
      width: 45px;
      height: 25px;
      background-color: #ffffff;
      border: 1px solid #D9DADC;
      border-radius: 9999px;
      box-shadow: inset -20px 0 0 0 #ffffff;
      transition-duration: 200ms;
    }

    input[type="checkbox"]:after {
      content: "";
      position: absolute;
      top: -1px;
      left: 1px;
      width: 24px;
      height: 24px;
      background-color: transparent;
      border-radius: 50%;
      box-shadow: 2px 4px 6px rgba(0, 0, 0, 0.2);
    }

    input[type="checkbox"]:checked {
      border-color: var(--bs-primary);
      box-shadow: inset 20px 0 0 0 var(--bs-primary);
    }

    input[type="checkbox"]:checked:after {
      left: 20px;
      box-shadow: -2px 4px 3px rgba(0, 0, 0, 0.05);
    }
  </style>
</head>

<body>
  <div class="todo-form pt-5 pb-5">
    <div class="container">
      <form action="newtodo.php" method="POST">
        <div class="mb-3">
          <label for="" class="form-label">Todo</label>
          <input type="text" name="todo_name" id="" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">New Todo</button>
      </form>
    </div>
  </div>
  <div class="todo-list">
    <div class="container border p-3">
      <?php foreach ($todos as $name => $value) : ?>
        <div class="todoList py-1 d-flex justify-content-between border-bottom">
          <div class="d-flex align-items-center">
            <form action="update.php" method="post" class="d-inline-block">
              <input type="hidden" name="todo_name" value=<?= $name ?>>
              <input class="updateCheckBox" type="checkbox" <?= $value["completed"] ? "checked" : "" ?>>
            </form>
            <h5 class="px-2 d-inline-block"><?= $name ?></h5>
          </div>
          <form action="delete.php" method="post">
            <input type="hidden" name="todo_name" value=<?= $name ?>>
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
          </form>
        </div>
      <?php endforeach; ?>
    </div>
  </div>


  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  <script>
    document.querySelectorAll(".updateCheckBox").forEach(el => {
      el.addEventListener("input", () => {
        el.parentElement.submit();
      })
    })
  </script>
</body>

</html>