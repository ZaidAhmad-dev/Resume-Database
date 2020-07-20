//







// Just for learning





//

<?php
require_once "pdo.php";

if(isset($_POST['email']) && isset($_POST['password']) ){
        echo ("Handling Post Data.. \n");
        $sql = "SELECT name FROM users WHERE :em= email and :pw=password ";
        echo "<pre>\n.$sql.\n</pre>";
        $stmt = $pdo->prepare($sql);
        $stmt -> execute(array(
            ':em' => $_POST['email'],
            ':pw' => $_POST['password']
        ));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

var_dump($row);
if ( $row === FALSE ) {
   echo "<h1>Login incorrect.</h1>\n";
} else { 
   echo "<p>Login success.</p>\n";
}

?>
<p>Please Login</p>
<form method="post">
<p>Email:
<input type="text" size="40" name="email"></p>
<p>Password:
<input type="text" size="40" name="password"></p>
<p><input type="submit" value="Login"/>
<a href="<?php echo($_SERVER['PHP_SELF']);?>">Refresh</a></p>
</form>
<p>