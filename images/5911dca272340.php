<?php
    session_start();

    $mailError = isset($_SESSION["mailError"]) ? $_SESSION["mailError"] : "";
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
  </head>
  <body>
      <main class="main">
          <div class="form-container">
              <form class="form-login" action="php/registerController.php" method="post">
                    <h1 class="form-title">Registrate</h1>
                    <input id ="register-name" name='name' placeholder='Nombre' type='text'/><br>
                    <input id ="register-user-name" name='user-name' placeholder='Usuario' type='text'/><br>
                    <input id ="register-mail" name='mail' placeholder='Mail' type='e-mail'/><br>
                    <span><?php echo $mailError; ?></span>
                    <input id="register-password" name='password' placeholder='Password' type='password'/><br>
                    <div class="register-submit-container">
                      <input id="register-submit" type='submit' value='Registrate'/>
                    </div>
              </form>
          </div>
      </main>

    </div>
  </body>
</html>
