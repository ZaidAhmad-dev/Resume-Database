<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=misc','zaid','123');
// See the error folders for details

$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

?>