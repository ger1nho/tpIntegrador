<?php

    session_start();
    include("functions.php");

    if($_POST){
      $users = getUsers();
      $valido = validarLogin($_POST,$users);
      if($valido){
        $_SESSION["iniciada"] = true;
        header("Location: ../home.php");
      }
      else{
        $_SESSION["iniciada"] = false;
        header("Location: ../login.php");
      }




    }





 ?>
