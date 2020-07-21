<?php

session_start();

if(!isset($_SESSION['value'])){
    echo("<p> Session is empty </p>\n");
    $_SESSION['value']=0;
}
elseif($_SESSION['value']<3){
    $_SESSION['value'] = $_SESSION['value'] + 1;
    echo ("<p> Added one</p>\n");
}
else{
    session_destroy();
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaid Sessions</title>
</head>
<body>
    <p><a href="sessfun.php">Click Me</a></p>
    <p>Our session id is
    <?php
        echo (session_id());
    ?>
    <pre>
    <?php
    print_r($_SESSION);
    ?>
    </pre>
     </p>
</body>
</html>