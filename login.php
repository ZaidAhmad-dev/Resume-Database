<?php
   
   session_start();

   if(isset($_POST["account"]) && isset($_POST["pw"])){
      unset($_SESSION["account"]);

      if ($_POST['pw']== 'umsi') {
         $_SESSION["account"] = $_POST["account"];
         $_SESSION["success"] = "Logged in.";
            header( 'Location: app.php' ) ;
            return;
        } else {
            $_SESSION["error"] = "Incorrect password.";
            header( 'Location: login.php' ) ;
            return;
        }
      }

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login with Sessions by Zaid</title>
</head>
<body>

<h1>Please Log in</h1>

   <?php

      if (isset($_SESSION['error'])) {
         echo('<p style= "color:red">  '.$_SESSION["error"]."</p>\n");
         unset($_SESSION['error']);
      }

   ?>
   <form method="post">
<p>Account: <input type="text" name="account" value=""></p>
<p>Password: <input type="text" name="pw" value=""></p>
<!-- password is umsi -->
<p><input type="submit" value="Log In">
<a href="app.php">Cancel</a></p>
</form>
</body>
</html>