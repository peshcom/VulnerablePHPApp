<?php

require_once("db.php");

session_start();
if (!empty($_SESSION['user_id'])) {
  header("Location: index.php");
}

    $errors = '';
    if (!empty($_POST["username"]))
    {
      $username = $_POST["username"];

      $sql = "SELECT id, username, password_hash FROM `users` WHERE `username`='".sanitize($username)."' LIMIT 1";
      $temp = $mysqli->query($sql) or die($mysqli->error);
      if ($temp !== false)
      {
        while ($row = $temp->fetch_assoc()) {
          if (password_verify($_POST["password"], $row['password_hash'])) {
            $_SESSION['user_id'] = $row['id'];
            header("Location: index.php");
            die();

          }
        }
        $temp->close();
      }

      $errors = "Неправильное имя пользователя или пароль";
    }

    ?>

    <!doctype html>
      <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <title>Вход</title>
        <link rel="stylesheet" type="text/css" href="/styles/style.css">
      </head>
      <body class="text-center">

        <main class="form-signin">
          <form method="POST">
            <h1 class="h3 mb-3 fw-normal">Вход</h1>
            <?php
            if ($errors) {
            ?>
            <div class="p-3 text-danger"><?php echo $errors; ?></div>
          <?php } ?>
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
              <label for="floatingInput">Имя пользователя</label>
            </div>
            <div class="form-floating">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
              <label for="floatingPassword">Пароль</label>
            </div>

            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Запомнить меня
              </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Вход</button>
            <div class="small pt-2">Нет аккаунта? <a href="/register.php">Зарегистрироваться</a></div>
          </form>
        </main>



      </body>
      </html>
