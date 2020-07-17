<?php

echo "<pre>\n";
require_once "pdo.php";


$pdo = new PDO('mysql:host=localhost;port=3306;dbname=misc','zaid','123');
$stmt = $pdo->query("SELECT * FROM users");
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    print_r($row);
}

echo "<pre>\n";

?>