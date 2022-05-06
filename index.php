<?php

require_once("db.php");
require_once("session.php");

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
    <title>Главная</title>

  </head>
  <body class="bg-light">
    <header class="p-3 bg-dark text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li>
              <a href="/" class="nav-link px-2 text-white">Главная</a>
            </li>

          </ul>
          <div class="text-end">
            <a href="/logout.php" role="button" class="btn btn-outline-light">Выход</a>
          </div>
        </div>
      </div>
    </header>
    <br>
    <br>
    <br>
    <main class="container">
      <div class="card">
        <div class="card-body">
          <form action="/create_post.php" method="POST" enctype="multipart/form-data">
            <p>Новая запись</p>
            <textarea name="text" class="form-control form-control-sm" placeholder="Напишите что нибудь"></textarea>
            <div class="d-flex justify-content-between pt-3">
              <input type="file" name="file" class="form-control">
              <button class="w-25 btn btn-primary" type="submit">Опубликовать</button>
            </div>
          </form>
        </div>
      </div>
      <br>
      <br>
      <br>


      <?php
      // Показывать только мои записи
      // $temp = $mysqli->query("SELECT notes.id, notes.text, notes.filepath, notes.user_id, notes.date, users.username FROM `notes` INNER JOIN `users` ON notes.user_id = users.id WHERE `user_id`=".$_SESSION['user_id']." ORDER BY notes.id DESC ") or die($mysqli->error);

      // Показывать все записи
      $temp = $mysqli->query("SELECT notes.id, notes.text, notes.filepath, notes.user_id, notes.date, users.username FROM `notes` INNER JOIN `users` ON notes.user_id = users.id ORDER BY notes.id DESC ") or die($mysqli->error);
      if ($temp !== false)
      {
        while ($row = $temp->fetch_assoc()) {
          ?>
          <div class="card mb-3">
            <div class="card-header d-flex justify-content-between bg-white border-0 ">
              <div class="my-auto">
                <h5><?php echo $row['username']; ?></h5>
                <div class="small text-muted"><?php echo $row['date']; ?></div>
              </div>
              <?php
              if ((int)$row['user_id'] == (int)$_SESSION['user_id'])
                { ?>
                  <a href="/delete_post.php?note_id=<?php echo $row['id']; ?>">delete</a>
                <?php } ?>

              </div>
              <div class="card-body">
                <?php echo $row['text']; ?>

                <?php
                if (!empty($row['filepath']))
                  { ?>
                    <hr>
                    <div class="small">Files:</div>
                    <div class="small"><a href="<?php echo $row['filepath']; ?>"><?php echo $row['filepath']; ?></a></div>
                  <?php } ?>

                </div>
              </div>
              <?php
            }
            $temp->close();
          }

          ?>
        </main>
        <br>
        <br>
        <br>
        <br>
      </body>
      </html>
