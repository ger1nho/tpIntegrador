<?php

    session_start();

    if(isset($_POST["reiniciar"])){
      $_SESSION["contador"] = 0;
    }
    elseif(isset($_POST["incrementar"])){
      $_SESSION["contador"]++;
    }

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form method="post">
       <input type="submit" name="reiniciar" value="reiniciar">
       <input type="submit" name="incrementar" value="incrementar">
     </form>
   </body>
 </html>
