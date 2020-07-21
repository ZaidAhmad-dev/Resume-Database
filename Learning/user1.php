<?php

require_once "PDO.php";
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])  ) {
    $sql = "INSERT INTO USERS(name,email,password)
    VALUES(:name, :email, :password)  ";
    echo "<pre>\n".$sql."\n</pre>";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password']
    ));
}
?>

<html>
<head>
    <title>Zaid Ahmad</title>
</head>
<body>

<p>Add a new user</p>
<form action="" method="post">
<p>Name: <input type="text" name="name" id="name" size="40"></p>
<p>Email: <input type="email" name="email" id="email"></p>
<p>Password: <input type="password" name="password" id="password"></p>
<p><input type="submit" value="Add New"></p>
</form>
    
</body>
</html>