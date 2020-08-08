<?php

// Made the connection with MySQL
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=misc','root','root');
// See the error folders for details 

$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

?>