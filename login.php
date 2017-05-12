<?php
  session_start();

  $_SESSION["log-errores"] = !isset($_SESSION["log-errores"]) ? "" : $_SESSION["log-errores"];
  $_SESSION["iniciada"] = !isset($_SESSION["iniciada"]) ? false : $_SESSION["iniciada"];
  $_SESSION["usuario"] = !isset($_SESSION["usuario"]) ? "" : $_SESSION["usuario"];
  if(!$_SESSION["iniciada"]){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <title>Login</title>
  </head>
  <body>
      <div class="container">
        <header class="header">
            <a href="index.php"><img src="images/logo.png" alt="imagen logo" class="logo-imagen"></a>
            <nav class="navigation">
                <ul class="nav-list">
                  <a class="link" href="register.php"><li class="nav-item nav-item-register">No tenes una cuenta? Registrate</li></a>
                </ul>
            </nav>
        </header>

        <main class="main">
            <div class="form-container">
                <form class="form-login" action="php/login.controller.php" method="post">
                      <h1 class="form-title">Login</h1>
                      <?php if($_SESSION["log-errores"]): ?>
                      <div class="login-errores">
                        <p class="error-valor"><?php echo $_SESSION["log-errores"]; ?></p>
                      </div>
                    <?php endif; ?>
                      <div class="login-contenido">
                        <input id ="name" name='usuario' placeholder='Usuario' value="<?php if(isset($_COOKIE["usuario"])) echo $_COOKIE["usuario"]; else echo $_SESSION["usuario"]; ?>" type='text'/>
                        <input id="password" name='password' placeholder='Password' type='password'/>
                      </div>
                      <div class='remember-container'>
                        <input class="remember-checkbox" name='remember' type='checkbox' <?php if(isset($_COOKIE["usuario"])):?> checked <?php endif; ?> value="recordar"/>
                        <label class="remember-label" for='remember'></label>Recordarme
                      </div>
                      <div class="submit-container">
                        <input id="submit" type='submit' value='Login'/>
                      </div>
                      <div class="forgot-container">
                        <a class='forgot' href='#'>Olvidaste tu contraseña?</a>
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
