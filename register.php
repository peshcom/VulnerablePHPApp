<?php

require_once("db.php");

session_start();
if (!empty($_SESSION['user_id'])) {
  header("Location: index.php");
}

if (!empty($_POST["username"]))
{
  $username = $_POST["username"];

  // Тут нет экранирования!! (оставлено как пример)
  $sql = "INSERT INTO `users` (`username`, `password_hash`) VALUES ('".$username."', '".password_hash($_POST["password"], PASSWORD_DEFAULT)."')";
    $mysqli->query($sql) or die($mysqli->error);
    $mysqli->commit();
    $mysqli->close();
    header("Location: login.php");
    die();
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
      <title>Регистрация</title>
      <link rel="stylesheet" type="text/css" href="/styles/style.css">
    </head>
    <body class="text-center">

      <main class="form-signin">
        <form method="POST">
          <h1 class="h3 mb-3 fw-normal">Регистрация</h1>

          <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
            <label for="floatingInput">Имя пользователя</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Пароль</label>
          </div>
          <br>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Зарегистрироваться</button>
          <div class="small pt-2">Уже есть аккаунт? <a href="/login.php">Войти</a></div>
        </form>
      </main>



    </body>
    </html>
