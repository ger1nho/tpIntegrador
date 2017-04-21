<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <title>Register</title>
  </head>
  <body>
    <div class="container">
      <header class="header">
          <img src="" alt="">
          <nav class="navigation">
              <ul class="nav-list">
                <a class="link" href="login.php"><li class="nav-item">Login</li></a>
                <a class="link" href="index.php"><li class="nav-item">Inicio</li></a>
              </ul>
          </nav>
      </header>

      <main class="main">
          <div class="form-container">
              <form class="form-login" action="php/register.controller.php" method="post" enctype="multipart/form-data">
                    <h1 class="form-title">Registrate</h1>
                    <input id ="register-name" name='name' placeholder='Nombre' type='text'/>
                    <input id ="register-apellido" name='apellido' placeholder='Apellido' type='text'/>
                    <input id ="register-user-name" name='user-name' placeholder='Usuario' type='text'/>
                    <input id ="register-mail" name='mail' placeholder='Mail' type='e-mail'/>
                    <input id="register-password" name='password' placeholder='Password' type='password'/>
                    <input id="register-password2" name='password2' placeholder='Confirmar password' type='password'/>
                    <input type="file" name="avatar" value="">
                    <div class="register-submit-container">
                      <input id="register-submit" type='submit' value='Registrate'/>
                    </div>
              </form>
          </div>
      </main>
      <?php include("footer.html"); ?>

    </div>
  </body>
</html>
