<?php
    session_start();
    if($_SESSION["iniciada"]){
 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="/css/normalize.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <script src="https://use.fontawesome.com/57be1b068d.js"></script>
        <title>Home</title>
    </head>

    <body>
      <header class="header">
          <img src="" alt="">
          <nav class="navigation">
              <ul class="nav-list">
                <a class="link" href="php/logout.php"><li class="nav-item">Cerrar sesion</li></a>
              </ul>
          </nav>
      </header>

      <div class="container">
        <h1>Bienvenido <?php echo $_SESSION["usuario"]; ?></h1>
    </body>
    <?php include("footer.html"); ?>
</html>

<?php

  }
  else
    header("Location: login.php");
 ?>
