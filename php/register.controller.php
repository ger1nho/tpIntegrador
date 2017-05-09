<?php
  session_start();
  include("functions.php");

  if($_POST){

    $errors = validarRegistro($_POST);
    // var_dump($errors);exit;

    if(!$errors){
      guardarUsuario($_POST);
      $_SESSION["iniciada"] = true;
      header("Location: ../home.php");
    }
    else{
      $_SESSION["reg-errores"] = $errors;
      $_SESSION["iniciada"] = false;
      header("Location: ../register.php");
    }
  }

 ?>
