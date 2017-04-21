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
            <img src="" alt="">
            <nav class="navigation">
                <ul class="nav-list">
                  <a class="link" href="register.php"><li class="nav-item nav-item-register">No tenes una cuenta? Registrate</li></a>
                  <a class="link" href="index.php"><li class="nav-item">Inicio</li></a>
                </ul>
            </nav>
        </header>

        <main class="main">
            <div class="form-container">
                <form class="form-login" action="" method="post">
                      <h1 class="form-title">Login</h1>
                      <input id ="name" name='username' placeholder='Username' type='text'/>
                      <input id="password" name='password' placeholder='Password' type='password'/>
                      <div class='remember-container'>
                        <input class="remember-checkbox" name='remember' type='checkbox'/>
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

          <?php include("footer.html"); ?>
      </div>
  </body>
</html>
