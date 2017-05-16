<?php

  session_start();

  $_SESSION["reg-errores"] = !isset($_SESSION["reg-errores"]) ? "" : $_SESSION["reg-errores"];
  $_SESSION["nombre"] = !isset($_SESSION["nombre"]) ? "" : $_SESSION["nombre"];
  $_SESSION["apellido"] = !isset($_SESSION["apellido"]) ? "" : $_SESSION["apellido"];
  $_SESSION["usuario"] = !isset($_SESSION["usuario"]) ? "" : $_SESSION["usuario"];
  $_SESSION["mail"] = !isset($_SESSION["mail"]) ? "" : $_SESSION["mail"];
  $_SESSION["iniciada"] = !isset($_SESSION["iniciada"]) ? false : $_SESSION["iniciada"];


  if(!$_SESSION["iniciada"]){
?>

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
    <header class="header">
        <a href="index.php"><img src="images/logo.png" alt="imagen logo" class="logo-imagen"></a>
    </header>
    <div class="container">
      <main class="main">
          <div class="form-container">
              <form class="form-login" action="php/register.controller.php" method="post" enctype="multipart/form-data">
                    <h1 class="form-title">Registrate</h1>
                    <?php if($_SESSION["reg-errores"]): ?>
                    <div class="register-errores">
                      <?php foreach ($_SESSION["reg-errores"] as $valores):?>
                      <p class="error-valor"><?php echo $valores; ?></p>
                    <?php endforeach; ?>
                    </div>
                  <?php endif; ?>
                    <div class="register-contenido">
                      <input id ="register-name" name='nombre' placeholder='Nombre' value = "<?php echo $_SESSION["nombre"]; ?>" type='text'/>
                      <input id ="register-apellido" name='apellido' placeholder='Apellido' value = "<?php echo $_SESSION["apellido"]; ?>" type='text'/>
                      <input id ="register-user-name" name='usuario' placeholder='Usuario' value = "<?php echo $_SESSION["usuario"]; ?>" type='text'/>
                      <input id ="register-mail" name='mail' placeholder='Mail' value = "<?php echo $_SESSION["mail"]; ?>" type='e-mail'/>
                      <input id="register-password" name='password' placeholder='Password' type='password'/>
                      <input id="register-password2" name='password2' placeholder='Confirmar password' type='password'/>
                      <label for="foto-perfil" class="foto-label">Foto Perfil: </label>
                      <input id="foto-perfil" name='foto-perfil' type='file'/>
                    </div>

                    <div class="register-submit-container">
                      <input id="register-submit" type='submit' value='Registrate'/>
                    </div>
              </form>
          </div>
      </main>
    </div>
  </body>
</html>

<?php
    }
    else
      header("Location: home.php");

 ?>
